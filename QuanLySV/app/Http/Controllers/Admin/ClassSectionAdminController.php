<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\ClassSection;
use App\Models\Code;
use App\Models\Enrollment;
use App\Models\EnrollmentDetail;
use App\Models\Grades;
use App\Models\GradesDetail;
use App\Models\Schedule;
use App\Models\SemesterSubject;
use App\Models\StartEndDate;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClassSectionAdminController extends Controller
{
    public function form()
    {
        $classSection = ClassSection::with('startEndDate', 'enrollmentDetail', 'semesterSubject', 'code', 'term')->orderBy('class_section_id', 'DESC')
            ->paginate(10);
        foreach ($classSection as $item) {
            $registration_number = EnrollmentDetail::where('class_section_id', $item->class_section_id)
                ->count();
            $registrationNumbers[$item->class_section_id] = $registration_number;
        }
        return view('Admin.ClassSection.list', compact('classSection', 'registrationNumbers'));
    }

    public function formAdd()
    {
        $semesterSubject = SemesterSubject::with('semester', 'subject')
            ->orderBy('semester_id')->get();
        return view('Admin.ClassSection.add', compact('semesterSubject'));
    }
    public function dequy($subject_code, $count)
    {
        $result = ClassSection::where('class_section_code', $subject_code . '_' . ($count + 1))->first();
        if ($result) {
            $count = $count + 1;
            return $this->dequy($subject_code, $count);
        }
        return $count;
    }
    public function add(Request $request)
    {
        $request->validate([
            'semester_subject_id' => 'required',
            'class_section_capacity' => 'required|integer',

        ]);
        $code = Code::where('on_off', 1)->first();
        $term = Term::where('on_off', 1)->first();
        $semesterSubject = SemesterSubject::where('semester_subject_id', $request->semester_subject_id)->first();
        $subjectId = $semesterSubject->subject_id;
        $subjectItem = Subject::where('subject_id', $subjectId)->first();
        $count = ClassSection::join('tbl_semester_subject', 'tbl_semester_subject.semester_subject_id', '=', 'tbl_class_section.semester_subject_id')
            ->where('subject_id', $subjectId)
            ->count();
        $count = $this->dequy($subjectItem->subject_code, $count);

        $classSection = ClassSection::create([
            'class_section_code' => $subjectItem->subject_code . '_' . ($count + 1),
            'class_section_name' => $subjectItem->subject_name,
            'semester_subject_id' => $request->semester_subject_id,
            'class_section_capacity' => $request->class_section_capacity,
            'code_id' => $code->code_id,
            'term_id' => $term->term_id
        ]);
        if ($classSection !== null) { // laravel sẽ tự chuyển đổi thành true/false nên có thể dùng if($student)
            return redirect()->back()->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }


    public function update(Request $request, $class_section_id)
    {
        $registration_number = EnrollmentDetail::where('class_section_id', $class_section_id)->count();
        if ($request->capacity_value >= $registration_number) {
            $classSection = ClassSection::where('class_section_id', $class_section_id)
                ->update([
                    'class_section_capacity' => $request->capacity_value
                ]);
            if ($classSection !== null) {
                return response()->json(['success' => 'Capacity updated successfully'], 200);
            }
            return response()->json(['error' => 'Failed to update Capacity'], 500);
        }
        return response()->json(['error' => 'Capacity must >= Registration_number'], 500);
    }

    public function delete(Request $request)
    {
        if ($request->has('selected_items')) {
            $selectedItems = $request->selected_items;
            $classSection = ClassSection::whereIn('class_section_id', $selectedItems)->delete();
            if ($classSection) {
                return response()->json(['success' => 'Class Section deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to delete Class Section'], 500);
            }
        }
    }

    // public function searchClass(Request $request)
    // {
    //     $keyword = $request->keyword;
    //     $class = Classs::where('class_code', $request->keyword)
    //         ->orWhere('class_name', 'like', '%' . $request->keyword . '%')
    //         ->paginate(10);
    //     if ($class->isNotEmpty()) {
    //         return view('Admin.Class.searchClass', compact('class', 'keyword'));
    //     }
    //     $error = 'No matching data found';
    //     return view('Admin.Class.searchClass', compact('error', 'keyword'));
    // }

    public function formAddDate()
    {
        $classSection = ClassSection::orderBy('class_section_id')->get();
        return view('Admin.ClassSection.startEndDate', compact('classSection'));
    }

    public function addDate(Request $request)
    {
        $request->validate([
            'class_section_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date'
        ]);
        $startEndDate = StartEndDate::create([
            'class_section_id' => $request->class_section_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);
        if ($startEndDate !== null) { // laravel sẽ tự chuyển đổi thành true/false nên có thể dùng if($student)
            return redirect()->route('admin.classSection.form')->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function formAddSchedule($start_end_date_id)
    {

        $sed = StartEndDate::where('start_end_date_id', $start_end_date_id)->first();
        $classroom = Classroom::get();
        return view('Admin.ClassSection.schedule', compact('sed', 'classroom'));
    }

    public function addSchedule(Request $request, $start_end_date_id)
    {
        $request->validate([

            'classroom_id' => 'required',
            'schedule_time' => 'required',
            'schedule_day' => 'required'
        ]);
        $schedule = Schedule::create([
            'start_end_date_id' => $start_end_date_id,
            'classroom_id' => $request->classroom_id,
            'schedule_time' => $request->schedule_time,
            'schedule_day' => $request->schedule_day
        ]);
        if ($schedule !== null) { // laravel sẽ tự chuyển đổi thành true/false nên có thể dùng if($student)
            return redirect()->route('admin.classSectionSchedule.form', ['start_end_date_id' => $start_end_date_id])->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }
    public function formSchedule($start_end_date_id)
    {
        $sed = StartEndDate::with('classSection')
            ->where('start_end_date_id', $start_end_date_id)
            ->first();
        $schedule = Schedule::with('classroom')
            ->where('start_end_date_id', $start_end_date_id)->get();
        return view('Admin.ClassSection.listSchedule', compact('sed', 'schedule'));
    }

    public function formupdateSchedule($schedule_id)
    {
        $schedule = Schedule::where('schedule_id', $schedule_id)->first();
        $classroom = Classroom::get();
        return view('Admin.ClassSection.updateSchedule', compact('schedule', 'classroom'));
    }
    public function updateSchedule(Request $request, $schedule_id)
    {
        $request->validate([
            'classroom_id' => 'required',
            'schedule_time' => 'required',
            'schedule_day' => 'required'
        ]);
        $schedule = Schedule::where('schedule_id', $schedule_id)->update([
            'classroom_id' => $request->classroom_id,
            'schedule_time' => $request->schedule_time,
            'schedule_day' => $request->schedule_day
        ]);

        if ($schedule !== null) { // laravel sẽ tự chuyển đổi thành true/false nên có thể dùng if($student)
            $schedule = Schedule::where('schedule_id', $schedule_id)->first();
            return redirect()->route('admin.classSectionSchedule.form', ['start_end_date_id' => $schedule->start_end_date_id])->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }
    public function deleteSchdule(Request $request)
    {
        if ($request->has('selected_items')) {
            $selectedItems = $request->selected_items;
            $schedule = Schedule::whereIn('schedule_id', $selectedItems)->delete();
            if ($schedule) {
                return response()->json(['success' => 'Schedule deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to delete Schedule'], 500);
            }
        }
    }

    public function formupdateSed($start_end_date_id)
    {
        $sed = StartEndDate::where('start_end_date_id', $start_end_date_id)->first();
        return view('Admin.ClassSection.updateSed', compact('sed'));
    }

    public function updateSed(Request $request, $start_end_date_id)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required|after:start_date'
        ]);
        $startEndDate = StartEndDate::where('start_end_date_id', $start_end_date_id)->update([

            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);
        if ($startEndDate !== null) { // laravel sẽ tự chuyển đổi thành true/false nên có thể dùng if($student)
            return redirect()->route('admin.classSectionSchedule.form', ['start_end_date_id' => $start_end_date_id])->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function deleteSed($start_end_date_id)
    {
        $scheduleIds = Schedule::where('start_end_date_id', $start_end_date_id)->pluck('schedule_id');
        $schedule = Schedule::whereIn('schedule_id', $scheduleIds)->delete();
        if ($schedule) {
            StartEndDate::where('start_end_date_id', $start_end_date_id)->delete();
            return redirect()->route('admin.classSection.form')->with('success', 'Deleted successfully');
        } else {
            return redirect()->back();
        }
    }

    public function student($class_section_id)
    {
        $listStudent = EnrollmentDetail::with('enrollment')
            ->where('class_section_id', $class_section_id)
            ->orderBy('enrollmentdetail_id', 'DESC')
            ->get();
        // dd($listStudent);
        $listGrades = GradesDetail::with('grades')
            ->where('class_section_id', $class_section_id)
            ->get();
        // dd($listStudent);
        return view('Admin.ClassSection.listStudentRegister', compact('listStudent', 'listGrades', 'class_section_id'));
    }

    public function formGrades($class_section_id, $student_id)
    {
        $classSection = ClassSection::with('semesterSubject')
            ->where('class_section_id', $class_section_id)->first();
        // dd($classSection);
        $student = Student::where('student_id', $student_id)->first();

        $grades = Grades::where('student_id', $student_id)
            ->where('subject_id', $classSection->semesterSubject->subject_id)->first();
        //Nếu tồn tại điểm thì lấy chi tiết điểm đưa sang view
        if ($grades !== null) {
            $gradesDetail = GradesDetail::where('grades_id', $grades->grades_id)
                ->where('class_section_id', $class_section_id)->first();
            if ($gradesDetail !== null) {
                // dd($gradesDetail);
                return view('Admin.ClassSection.formGrades', compact('classSection', 'student', 'gradesDetail'));
                //->with('gradesDetail', $gradesDetail);
            } else {
                return view('Admin.ClassSection.formGrades', compact('classSection', 'student'));
            }
        } else {
            return view('Admin.ClassSection.formGrades', compact('classSection', 'student'));
        }
    }

    public function updateGrades(Request $request)
    {
        // dd($request->subject_id);
        $request->validate([
            'process_points' => 'max:10|min:0',
            'test_score' => 'max:10|min:0',
            'final_grades' => 'max:10|min:0'
        ]);
        $classSection = ClassSection::with('semesterSubject')->where('class_section_id', $request->class_section_id)
            ->first();
        $grades = Grades::where('student_id', $request->student_id)
            ->where('subject_id', $classSection->semesterSubject->subject_id)
            ->first();
        if ($grades == null) {
            $grade = Grades::create([
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id
            ]);
            $gradesDetail = GradesDetail::create([
                'grades_id' => $grade->grades_id,
                'process_points' => $request->process_points,
                'test_score' => $request->test_score,
                'final_grades' => $request->final_grades,
                'attempt_number' => 1,
                'class_section_id' => $request->class_section_id
            ]);
            return redirect()->route('admin.listStudentRegister.form', ['class_section_id' => $request->class_section_id]);
        } else {
            $gradesdeati = GradesDetail::where('class_section_id', $request->class_section_id)
                ->where('grades_id', $grades->grades_id)->first();
            if ($gradesdeati !== null) {
                $gradesDetail = GradesDetail::where('grades_id', $grades->grades_id)
                    ->where('class_section_id', $request->class_section_id)
                    ->update([
                        'process_points' => $request->process_points,
                        'test_score' => $request->test_score,
                        'final_grades' => $request->final_grades,
                        // 'attempt_number' => $term,
                    ]);
                return redirect()->route('admin.listStudentRegister.form', ['class_section_id' => $request->class_section_id]);
            } else {
                $term = GradesDetail::where('grades_id', $grades->grades_id)->count();

                $gradesDetail = GradesDetail::create([
                    'grades_id' => $grades->grades_id,
                    'process_points' => $request->process_points,
                    'test_score' => $request->test_score,
                    'final_grades' => $request->final_grades,
                    'attempt_number' => $term + 1,
                    'class_section_id' => $request->class_section_id
                ]);
                return redirect()->route('admin.listStudentRegister.form', ['class_section_id' => $request->class_section_id]);
            }
        }
    }

    public function addformstudentClassSection($class_section_id)
    {
        $student = Student::get();

        return view('Admin.ClassSection.addStudent', compact('class_section_id', 'student'));
    }

    public function addstudentClassSection(Request $request)
    {
        //Lấy thông tin đky học
        $enrollment = Enrollment::where('student_id', $request->student_code)->first();
        //Chưa có thì tạo
        if ($enrollment == null) {
            $enrollment = Enrollment::create([
                'student_id' => $request->student_code
            ]);
        }
        $enrollment = Enrollment::where('student_id', $request->student_code)->first();
        $enrollmentId = $enrollment->enrollment_id;
        $enrollmentDetail = EnrollmentDetail::create([
            'enrollment_id' => $enrollmentId,
            'class_section_id' => $request->class_section_id,
            'enrollmentDetail_date' => Carbon::now()
        ]);
        return redirect()->route('admin.listStudentRegister.form', ['class_section_id'=>$request->class_section_id]);
    }
}
