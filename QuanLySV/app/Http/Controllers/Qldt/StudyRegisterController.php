<?php

namespace App\Http\Controllers\Qldt;

use App\Http\Controllers\Controller;
use App\Models\ClassSection;
use App\Models\Code;
use App\Models\CodeTerm;
use App\Models\Enrollment;
use App\Models\EnrollmentDetail;
use App\Models\Grades;
use App\Models\GradesDetail;
use App\Models\SemesterSubject;
use App\Models\Student;
use App\Models\Term;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudyRegisterController extends Controller
{
    public function form()
    {
        $user = Auth::guard('user')->user();

        $studentId = $user->student_id;
        //Thông tin sinh viên
        $studentValue = Student::with('class')
            ->where('student_id', $studentId)->first();
        //Danh sách môn học để cho sv đky
        $listSubject = SemesterSubject::with('subject')
            ->whereHas('semester', function ($query) {
                $query->where('IsOpenForRegistration', 1);
            })->get();
        //Kiểm tra sv có thông tin đky học chưa
        $enrollment = Enrollment::where('student_id', $studentId)->first();
        //Lấy ra thông tin đợt đky này (đang mở)
        $code = Code::where('on_off', 1)->first();
        $term = Term::where('on_off', 1)->first();
        //Có rồi thì lấy ra ds các lớp học phần sv đã đky trong đợt đky này
        if ($enrollment !== null) {


            //Lấy ds lớp học phần sv đky học trong đợt này
            $enrollmentDetail = EnrollmentDetail::with('classSection')
                ->where('enrollment_id', $enrollment->enrollment_id)
                ->whereHas('classSection', function ($query) use ($code, $term) {
                    $query->where('code_id', $code->code_id)
                        ->where('term_id', $term->term_id);
                })->get();
            //Lấy số lượng sv đky lớp
            $registrationNumber = [];
            foreach ($enrollmentDetail as $item) {
                $registration_numbers = EnrollmentDetail::where('class_section_id', $item->classSection->class_section_id)
                    ->count();
                $registrationNumber[$item->class_section_id] = $registration_numbers;
            }
            return view('Qldt.StudyRegister', compact('studentValue', 'listSubject', 'code', 'enrollmentDetail', 'registrationNumber'));
        }

        return view('Qldt.StudyRegister', compact('studentValue', 'listSubject', 'code'));
    }

    public function listClass(Request $request)
    {
        //Lấy ra thông tin đợt đky này (đang mở)
        $code = Code::where('on_off', 1)->first();
        $term = Term::where('on_off', 1)->first();

        //Lấy id (học kỳ_môn học) được chọn
        $semester_subject_id = $request->semester_subject_id;
        $drpWeekDay = $request->drpWeekDay; // thứ trong tuần
        //kiểm tra xem chọn môn học chưa
        if ($semester_subject_id !== null) {
            if ($drpWeekDay == 0) {  // Thứ = cả tuần
                //Lấy ds lớp học phần thuộc đợt mở của môn học
                $listClass = ClassSection::with('startEndDate', 'semesterSubject')
                    ->where('semester_subject_id', $semester_subject_id)
                    ->where('code_id', $code->code_id)
                    ->where('term_id', $term->term_id)
                    ->get();
                $registrationNumbers = [];
                foreach ($listClass as $item) {
                    $registration_number = EnrollmentDetail::where('class_section_id', $item->class_section_id)->count();
                    $registrationNumbers[$item->class_section_id] = $registration_number;
                }
                return redirect()->back()
                    ->with('listClass', $listClass)
                    ->with('registrationNumbers', $registrationNumbers);
            } else { //lọc lịch học theo 1 thứ trong tuần
                $listClass = ClassSection::with(['startEndDate.schedule', 'semesterSubject'])
                    ->whereHas('startEndDate.schedule', function ($query) use ($drpWeekDay) {
                        $query->where('schedule_day', $drpWeekDay);
                    })
                    ->where('semester_subject_id', $semester_subject_id)
                    ->where('code_id', $code->code_id)
                    ->where('term_id', $term->term_id)
                    ->get();
                $registrationNumbers = [];
                foreach ($listClass as $item) {
                    $registration_number = EnrollmentDetail::where('class_section_id', $item->class_section_id)->count();
                    $registrationNumbers[$item->class_section_id] = $registration_number;
                }
                return redirect()->back()
                    ->with('listClass', $listClass)
                    ->with('registrationNumbers', $registrationNumbers);
            }
        } else {
            return redirect()->back()
                ->with('error', 'You must select a study section to display classes!');
        }
    }

    public function dangKy(Request $request)
    {
        //Lấy id sinh viên
        $studentId = Auth::guard('user')->user()->student_id;
        //Lấy thông tin đky học
        $enrollment = Enrollment::where('student_id', $studentId)->first();
        //Chưa có thì tạo
        if ($enrollment == null) {
            $enrollment = Enrollment::create([
                'student_id' => $studentId
            ]);

        }
        $enrollment = Enrollment::where('student_id', $studentId)->first();
        //lấy id đăng ký học
        $enrollmentId = $enrollment->enrollment_id;
        // dd($enrollmentId);
        //Lấy id lớp học phần sv chọn
        $class_section_id = $request->radiodangky;
        //Lấy lớp học phần sv chọn
        $classSectionItem = ClassSection::where('class_section_id', $class_section_id)->first();
        //Lấy sĩ số lớp học phần sv chọn
        $capacity = $classSectionItem->class_section_capacity;
        //Lấy số lượng sv đã đky lớp học phần đấy
        $registration_number = EnrollmentDetail::where('class_section_id', $class_section_id)->count();
        if ($registration_number >= $capacity) {
            return redirect()->back()->with('error', 'Do not exceed maximum Capacity');
        }
        //Lấy (môn học - học kỳ) của lớp học phần sv chọn
        $semesterSubject = SemesterSubject::where('semester_subject_id', $classSectionItem->semester_subject_id)->first();
        //Lấy mã môn học của lớp học phần sv chọn
        $subjectId = $semesterSubject->subject_id;
        //Lấy điểm môn học của sv thuộc lớp học phần sv chọn
        $grades = Grades::where('student_id', $studentId)->where('subject_id', $subjectId)->first();
        //Nếu có điểm thì kiểm tra mức điểm có được dky học lại không
        if ($grades !== null) {
            $gradesDetail = GradesDetail::where('grades_id', $grades->grades_id)->get();
            foreach ($gradesDetail as $item) {
                //Nếu > 5 thì không cho dky học lại
                if ($item->final_grades > 5) {
                    return redirect()->back()
                        ->with('error', 'You can only register to upgrade your score if your TKHP score <= 5');
                }
            }
        }
        //cho đky học lại
        //Lấy danh sách all lớp học phần của môn này
        $classSection = ClassSection::where('semester_subject_id', $semesterSubject->semester_subject_id)->get();
        //Lấy danh sách all các lớp học phần mà sv đã đky
        $enrollmentDetail = EnrollmentDetail::where('enrollment_id', $enrollment->enrollment_id)->get();
        //Kiểm tra xem sv đã đky lớp học phần nào của môn này chưa
        foreach ($classSection as $item) {
            foreach ($enrollmentDetail as $enrollmentDetailItem) {
                //Nếu đã đky lớp học phần của môn này rồi thì không cho đky chỉ cho đổi lớp
                if ($item->class_section_id == $enrollmentDetailItem->class_section_id) {
                    return redirect()->back()->with('error', 'You have registered for this course');
                }
            }
        }
        //Nếu chưa đky lớp học phần nào của môn này thì cho đky
        $enrollmentDetail = EnrollmentDetail::create([
            'enrollment_id' => $enrollmentId,
            'class_section_id' => $class_section_id,
            'enrollmentDetail_date' => Carbon::now()
        ]);
        return redirect()->back()->with('success', 'Successfully registered');
    }

    public function changeClass($class_section_id)
    {
        $classSectionItem = ClassSection::where('class_section_id', $class_section_id)->first();
        $semesterSubjectId = $classSectionItem->semester_subject_id;
        //Lấy ra thông tin đợt đky này (đang mở)
        $code = Code::where('on_off', 1)->first();
        $term = Term::where('on_off', 1)->first();

        $changeClassSection = ClassSection::where('semester_subject_id', $semesterSubjectId)
            ->where('code_id', $code->code_id)
            ->where('term_id', $term->term_id)
            ->get();
        $registrationNumbers = [];
        foreach ($changeClassSection as $item) {
            $registration_number = EnrollmentDetail::where('class_section_id', $item->class_section_id)->count();
            $registrationNumbers[$item->class_section_id] = $registration_number;
        }
        return redirect()->back()
            ->with('changeClassSection', $changeClassSection)
            ->with('registrationNumbers', $registrationNumbers)
            ->with('class_section_id', $class_section_id);
    }

    public function updateChangeClass(Request $request)
    {
        //Lấy id sinh viên
        $studentId = Auth::guard('user')->user()->student_id;
        //Lấy thông tin đky học
        $enrollment = Enrollment::where('student_id', $studentId)->first();
        $class_section_id = $request->radiodangky;
        $class_section_id_old = $request->class_section_id_old;
        $enrollmentDetail = EnrollmentDetail::where('enrollment_id', $enrollment->enrollment_id)
            ->where('class_section_id', $class_section_id_old)
            ->update([
                'class_section_id' => $class_section_id
            ]);
        if ($enrollmentDetail !== null) {
            return redirect()->back()->with('success', 'Successfully Change Class');
        } else {
            return redirect()->back()->with('error', 'Class transfer failed');
        }
    }
}
