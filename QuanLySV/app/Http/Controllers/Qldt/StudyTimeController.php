<?php

namespace App\Http\Controllers\Qldt;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\CodeTerm;
use App\Models\Enrollment;
use App\Models\EnrollmentDetail;
use App\Models\Student;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudyTimeController extends Controller
{
    public function form()
    {
        $user = Auth::guard('user')->user();
        $studentId = $user->student_id;
        //Thông tin sinh viên
        $studentValue = Student::with('class')
            ->where('student_id', $studentId)->first();
        //Lấy danh sách các kỳ học
        $code = Code::orderBy('code_id', 'DESC')->get();
        //Lấy danh sách đợt học
        $term = Term::get();
        return view('Qldt.StudentTime', compact('code', 'studentValue', 'term'));
    }

    public function studyTime(Request $request)
    {
        $code_id = $request->drpSemester;
        $term_id = $request->drpTerm;
        $code = Code::where('code_id', $code_id)->first();
        $term = Term::where('term_id', $term_id)->first();
        $user = Auth::guard('user')->user();
        $studentId = $user->student_id;
        $enrollment = Enrollment::where('student_id', $studentId)->first();
        if ($enrollment == null) return redirect()->back()->with('error', 'You have not registered yet');
        //Lấy ds các lớp học phần sv đã đky trong kỳ học đó
        $enrollmentDetail = EnrollmentDetail::with('classSection')
            ->where('enrollment_id', $enrollment->enrollment_id)
            ->whereHas('classSection', function ($query) use ($code_id, $term_id) {
                $query->where('code_id', $code_id)
                    ->where('term_id', $term_id);
            })->get();
        //Lấy số lượng sv đky trong lớp học phần
        //Tạo mảng để lưu trữ số lượng sv đky lớp học phần
        $registrationNumbers = [];
        //Duyệt từng lớp học phần
        foreach ($enrollmentDetail as $item) {
            //Đếm số lượng data có class_section_id trùng với lớp học phần
            $registration_number = EnrollmentDetail::where('class_section_id', $item->classSection->class_section_id)
                ->count();
            $registrationNumbers[$item->class_section_id] = $registration_number;
        }
        return redirect()->back()
            ->with('enrollmentDetail', $enrollmentDetail)
            ->with('code', $code)
            ->with('term', $term)
            ->with('registrationNumbers', $registrationNumbers);
    }
}
