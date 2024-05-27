<?php

namespace App\Http\Controllers\Admin;

use App\Exports\StudentsExport;
use App\Exports\TemplateStudent;
use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use App\Models\Classs;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Major;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class StudentAdminController extends Controller
{
    public function formStudent()
    {
        // $students = Student::join('tbl_class', 'tbl_class.class_id', '=', 'tbl_student.class_id')
        //     ->join('tbl_course', 'tbl_class.course_id', '=', 'tbl_course.course_id')
        //     ->orderBy('student_id', 'DESC')->paginate(10);
        $students = Student::with('class')->orderBy('student_id', 'DESC')->paginate(10);
        $course = Course::get();
        $faculty = Faculty::get();
        $major = Major::get();
        $class = Classs::get();
        return view('Admin.Student.listStudent', compact('students', 'course', 'faculty', 'major', 'class'));
    }

    public function formAddStudent()
    {
        $class = Classs::with('course')->get();
        return view('Admin.Student.addStudent', compact('class'));
    }

    public function addStudent(Request $request)
    {
        $request->validate([
            'student_code' => 'required|unique:tbl_student,student_code',
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'student_avatar' => 'required',
            'class_id' => 'required'
        ]);

        $data = $request->all();
        $student = Student::create([  // nếu create thât bại sẽ trả về giá trị null
            'student_code' => $data['student_code'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'student_avatar' => $data['student_avatar'],
            'class_id' => $data['class_id']
        ]);

        if ($student !== null) { // laravel sẽ tự chuyển đổi thành true/false nên có thể dùng if($student)
            StudentAccount::create([
                'email' => $data['email'],
                'password' => bcrypt('1'), //với trường password laravel sẽ tự động mã hóa trước khi lưu vào csdl
                'student_id' => $student->student_id
            ]);
            return redirect()->back()->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function formUpdateStudent($student_id)
    {
        $student = Student::where('student_id', $student_id)->first();
        $class = Classs::get();
        return view('Admin.Student.updateStudent', compact('student', 'class'));
    }

    public function updateStudent(Request $request, $student_id)
    {
        $student = Student::where('student_id', $student_id)->first();
        $request->validate([
            'student_code' => [
                'required',

                Rule::unique('tbl_student')
                    ->ignore($student->student_code, 'student_code')
                //ignore(giá trị bỏ qua, tên cột)
            ],
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('tbl_student')->ignore($student->email, 'email')
            ],
            'phone' => [
                'required',
            ],
            'class_id' => 'required'
        ]);

        $data = $request->all();
        if ($request->hasFile('student_avatar')) {
            $avatar = $request->student_avatar;
        } else {
            $avatar = $request->old_student_avatar;
        }
        $student = Student::where('student_id', $student_id)->update([
            'student_code' => $data['student_code'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'student_avatar' => $avatar,
            'class_id' => $data['class_id']
        ]);
        if ($student !== null) {
            return redirect()->route('admin.student.form')->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function searchStudent(Request $request)
    {
        $searchBy = $request->searchBy;
        $keyword = $request->keyword;
        $keywords = explode(' ', $keyword);
        $firstName = $keywords[0];
        $lastName = $keywords[count($keywords) - 1];
        $query = Student::query()->with('class');
        if ($searchBy == '1') {
            $query->where('student_code', $keyword);
        } elseif ($searchBy == '2') {
            $query->Where('first_name', 'like', '%' . $firstName . '%')
                ->orWhere('last_name', 'like', '%' . $lastName . '%')
                ->orWhere('first_name', 'like', '%' . $lastName . '%')
                ->orWhere('last_name', 'like', '%' . $firstName . '%');
        } elseif ($searchBy == '3') {
            $query->whereDate('date_of_birth', $keyword);
        } elseif ($searchBy == '4') {
            $query->where('gender', 'like', '%' . $keyword . '%');
        } elseif ($searchBy == '5') {
            $query->where('address', 'like', '%' . $keyword . '%');
        } elseif ($searchBy == '6') {
            $query->where('phone ', $keyword);
        } elseif ($searchBy == '7') {
            $query->whereHas('class', function ($query) use ($keyword) {
                $query->where('class_name', 'like', '%' . $keyword . '%');
            });
        } elseif ($searchBy == '8') {
            $query->where('email', 'like', '%' . $keyword . '%');
        }
        $students = $query->paginate(10);
        if ($students->isEmpty()) {
            $error = 'No matching data found';
            return view('Admin.Student.searchStudent', compact('searchBy', 'keyword', 'error'));
        }
        return view('Admin.Student.searchStudent', compact('students', 'keyword', 'searchBy'));
    }

    public function exportStudents()
    {
        return Excel::download(new StudentsExport, 'list-student-export.xlsx');
    }

    public function formImportStudents()
    {
        return view('Admin.Student.import');
    }

    public function teamplateExport()
    {
        return Excel::download(new TemplateStudent, 'template-student.xlsx');
    }

    public function importStudents(Request $request)
    {
        if ($request->hasFile('import-students')) {
            $file = $request->file('import-students');
            $filePath = $file->getPathname();
            try {
                Excel::import(new StudentsImport, $filePath);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Data import failed');
            }
            return redirect()->back()->with('success', 'Enter data successfully');
        } else {
            return redirect()->back()->with('error', 'File does not exist');
        }
    }

    public function deleteStudent(Request $request)
    {
        if ($request->has('selected_items')) {
            $selectedItems = $request->selected_items;
            DB::beginTransaction();
            StudentAccount::whereIn('student_id', $selectedItems)->delete();
            $deleteStudent = Student::whereIn('student_id', $selectedItems)->delete();
            if ($deleteStudent) {
                DB::commit();
                return response()->json(['success' => 'Student deleted successfully'], 200);
            } else {
                DB::rollback();
                return response()->json(['error' => 'Failed to delete students'], 500);
            }
        }
    }

    public function filter(Request $request)
    {
        $f = $request->faculty;
        $m = $request->major;
        $cl = $request->class;
        $c = $request->course;
        $query = Student::query()
            ->join('tbl_class', 'tbl_class.class_id', '=', 'tbl_student.class_id')
            ->join('tbl_course', 'tbl_class.course_id', '=', 'tbl_course.course_id')
            ->join('tbl_major', 'tbl_major.major_id', '=', 'tbl_class.major_id')
            ->join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_major.faculty_id');

        if ($request->faculty !== null) {
            $query->where('tbl_faculty.faculty_id', $request->faculty);
        }
        if ($request->major !== null) {
            $query->where('tbl_major.major_id', $request->major);
        }
        if ($request->class !== null) {
            $query->where('tbl_class.class_id', $request->class);
        }
        if ($request->course !== null) {
            $query->where('tbl_course.course_id', $request->course);
        }

        $students = $query->paginate(10);

        $course = Course::get();
        $faculty = Faculty::get();
        $major = Major::get();
        $class = Classs::get();
        return view('Admin.Student.listStudent', compact('students', 'course', 'faculty', 'major', 'class', 'f', 'm', 'cl', 'c'));
    }

    public function getMajor($facultyId)
    {
        $major = Major::where('faculty_id', $facultyId)->get();
        return response()->json($major);
    }
    public function getClass($major_id)
    {
        $classs = Classs::where('major_id', $major_id)->get();
        return response()->json($classs);
    }

}
