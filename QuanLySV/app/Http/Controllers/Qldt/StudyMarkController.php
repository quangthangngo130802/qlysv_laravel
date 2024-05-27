<?php

namespace App\Http\Controllers\Qldt;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\EnrollmentDetail;
use App\Models\Grades;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudyMarkController extends Controller
{
    public function test()
    {
        $user = Auth::guard('user')->user();
        $studentId = $user->student_id;
        $enrollment = Enrollment::where('student_id', $studentId)->first();

        $a = EnrollmentDetail::with(['classSection' => function ($query) use ($studentId) {
            $query->whereHas('gradesdetail.grades', function ($query) use ($studentId) {
                $query->where('student_id', $studentId);
            });
        }])
            ->where('enrollment_id', $enrollment->enrollment_id)
            ->get();
        dd($a);
    }
    public function form()
    {
        $user = Auth::guard('user')->user();

        $studentId = $user->student_id;
        //Thông tin sinh viên
        $studentValue = Student::with('class')
            ->where('student_id', $studentId)
            ->first();
        $enrollment = Enrollment::where('student_id', $studentId)->first();
        if ($enrollment !== null) {
            // dd($enrollment);
            //Lấy điểm all môn học mà sv đã học
            $grades = Grades::with('gradesDetail')
                ->where('student_id', $studentId)
                ->get();
            //Lấy điểm tbc của mỗi kỳ
            $result = DB::table('tbl_enrollmentdetail')
                ->select(
                    'tbl_class_section.code_id',
                    'tbl_code.semester',
                    'tbl_code.year',
                    DB::raw('COUNT(*) AS total'), // đếm số bản ghi (để test code thôi)
                    DB::raw('SUM(tbl_subject.subject_credit) AS total_credit'), //Tổng  số tín chỉ
                    DB::raw('ROUND(SUM(tbl_subject.subject_credit * tbl_gradesdetail.final_grades) / SUM(tbl_subject.subject_credit), 2) AS tbc_he10'), //điểm tbc hệ 10
                    DB::raw('ROUND(
                                    SUM(
                                        CASE
                                            WHEN tbl_gradesdetail.final_grades >= 8.5 THEN 4 * tbl_subject.subject_credit
                                            WHEN tbl_gradesdetail.final_grades >= 7.0 THEN 3 * tbl_subject.subject_credit
                                            WHEN tbl_gradesdetail.final_grades >= 5.5 THEN 2 * tbl_subject.subject_credit
                                            WHEN tbl_gradesdetail.final_grades >= 4.0 THEN 1 * tbl_subject.subject_credit
                                        END
                                        ) / SUM(tbl_subject.subject_credit)
                                , 2) AS tbc_he4
                            ') // điểm tbc hệ 4
                )
                ->join('tbl_class_section', 'tbl_class_section.class_section_id', '=', 'tbl_enrollmentdetail.class_section_id')
                ->join('tbl_semester_subject', 'tbl_class_section.semester_subject_id', '=', 'tbl_semester_subject.semester_subject_id')
                ->join('tbl_subject', 'tbl_semester_subject.subject_id', '=', 'tbl_subject.subject_id')
                ->join('tbl_gradesdetail', 'tbl_gradesdetail.class_section_id', '=', 'tbl_class_section.class_section_id')
                ->join('tbl_code', 'tbl_code.code_id', '=', 'tbl_class_section.code_id')
                ->join('tbl_grades', 'tbl_grades.grades_id', '=', 'tbl_gradesdetail.grades_id')
                ->where('tbl_grades.student_id', $studentId) // chỉ lấy điểm của user()
                ->where('tbl_enrollmentdetail.enrollment_id', $enrollment->enrollment_id)
                ->where('tbl_gradesdetail.final_grades', '>', 4) //chỉ lấy những môn đã đạt
                ->groupBy(  //nhóm thoe học kỳ (code_id)
                    'tbl_class_section.code_id',
                    'tbl_code.semester',
                    'tbl_code.year'
                )
                ->orderBy('tbl_class_section.code_id') //sắp xếp tăng dần theo học kỳ
                ->get();
            if ($result->isEmpty()) {
                // dd('1');
                $tbc10 = '';
                $total_credit = '';
                $tbc4 = '';
                return view('Qldt.StudyMark', compact('grades', 'result', 'tbc10', 'total_credit', 'tbc4', 'studentValue'));
            }
            //   dd($result);
            // Lấy điểm các môn đã qua để tính tbc hệ 4
            $result1 = DB::table('tbl_enrollmentdetail')
                ->join('tbl_class_section', 'tbl_class_section.class_section_id', '=', 'tbl_enrollmentdetail.class_section_id')
                ->join('tbl_semester_subject', 'tbl_class_section.semester_subject_id', '=', 'tbl_semester_subject.semester_subject_id')
                ->join('tbl_subject', 'tbl_semester_subject.subject_id', '=', 'tbl_subject.subject_id')
                ->join('tbl_gradesdetail', 'tbl_gradesdetail.class_section_id', '=', 'tbl_class_section.class_section_id')
                // ->join('tbl_code', 'tbl_code.code_id', '=', 'tbl_class_section.code_id')
                ->join('tbl_grades', 'tbl_grades.grades_id', '=', 'tbl_gradesdetail.grades_id')
                ->where('tbl_grades.student_id', $studentId) // chỉ lấy điểm của user()
                ->where('tbl_enrollmentdetail.enrollment_id', $enrollment->enrollment_id)
                ->where('tbl_gradesdetail.final_grades', '>', 4) //chỉ lấy những môn đã đạt
                ->get();

            // if ($result->isEmpty()) {
            //     dd('1');
            //     $tbc10 = '';
            //     $total_credit = '';
            //     $tbc4 = '';
            //     return view('Qldt.StudyMark', compact('grades', 'result', 'tbc10', 'total_credit', 'tbc4', 'studentValue'));
            // }
            // dd($result1);
            $total_credit = 0;
            $total_grades10 = 0;
            foreach ($result1 as $item) {
                $total_credit += $item->subject_credit;     //Tổng số TC
                $total_grades10 += $item->subject_credit * $item->final_grades;     //Tổng (điểm * TC)
            }
            //dd($total_grades10);
            $tbc10 = round($total_grades10 / $total_credit, 2);     //toàn khóa

            $total_grades4 = 0;
            foreach ($result1 as $item) {
                if ($item->final_grades >= 8.5) {
                    $total_grades4 += 4 * $item->subject_credit;
                } elseif ($item->final_grades >= 7.0) {
                    $total_grades4 += 3 * $item->subject_credit;
                } elseif ($item->final_grades >= 5.5) {
                    $total_grades4 += 2 * $item->subject_credit;
                } elseif ($item->final_grades >= 4.0) {
                    $total_grades4 += 1 * $item->subject_credit;
                }
            }
            $tbc4 = round($total_grades4 / $total_credit, 2);       //toàn khóa

            return view('Qldt.StudyMark', compact('grades', 'result', 'tbc10', 'total_credit', 'tbc4', 'studentValue'));
        }
        return redirect()->back()->with('error', 'You have not registered yet');
    }

    public function chonhocky(Request $request)
    {
        $user = Auth::guard('user')->user();
        $studentId = $user->student_id;
        $enrollment = Enrollment::where('student_id', $studentId)->first();
        if ($request->code_id != '') {
            $listGrades =
                // EnrollmentDetail::with('classSection')
                //     ->where('enrollment_id', $enrollment->enrollment_id)
                //     ->whereHas('classSection', function ($query) use ($request) {
                //         $query->where('code_id', $request->code_id);
                //     })
                //     ->get();
                DB::table('tbl_enrollmentdetail')
                ->join('tbl_class_section', 'tbl_class_section.class_section_id', '=', 'tbl_enrollmentdetail.class_section_id')
                ->join('tbl_semester_subject', 'tbl_class_section.semester_subject_id', '=', 'tbl_semester_subject.semester_subject_id')
                ->join('tbl_subject', 'tbl_semester_subject.subject_id', '=', 'tbl_subject.subject_id')
                ->join('tbl_gradesdetail', 'tbl_gradesdetail.class_section_id', '=', 'tbl_class_section.class_section_id')
                ->join('tbl_code', 'tbl_code.code_id', '=', 'tbl_class_section.code_id')
                ->join('tbl_grades', 'tbl_grades.grades_id', '=', 'tbl_gradesdetail.grades_id')
                ->where('tbl_grades.student_id', $studentId) // chỉ lấy điểm của user()
                ->where('tbl_enrollmentdetail.enrollment_id', $enrollment->enrollment_id)
                ->where('tbl_code.code_id', $request->code_id)
                //->where('tbl_gradesdetail.final_grades', '>', 4) //chỉ lấy những môn đã đạt
                ->get();
            return redirect()->back()->with('listGrades', $listGrades)->with('code_id', $request->code_id);
        } else {
            return redirect()->route('user.studyMark.form');
        }
    }
}
