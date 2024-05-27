<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TeachersExport;
use App\Exports\TemplateTeacher;
use App\Http\Controllers\Controller;
use App\Imports\TeachersImport;
use App\Models\Faculty;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class TeacherAdminController extends Controller
{
    public function formTeacher()
    {
        $teachers = Teacher::with('faculty')
            ->orderBy('teacher_id', 'DESC')
            ->paginate(10);
        return view('Admin.Teacher.listTeacher', compact('teachers'));
    }

    public function formAddTeacher()
    {
        $faculty = Faculty::get();
        return view('Admin.Teacher.addTeacher', compact('faculty'));
    }

    public function addTeacher(Request $request)
    {
        $request->validate([
            'teacher_code' => 'required|min:9|max:9|unique:tbl_teacher,teacher_code',
            'teacher_name' => 'required',
            'teacher_email' => 'required|unique:tbl_teacher,teacher_email|email',
            'teacher_phone' => 'required|min:10|unique:tbl_teacher,teacher_phone|numeric',
            'teacher_address' => 'required',
            'teacher_date_of_birth' => 'required',
            'teacher_gender' => 'required',
            'faculty_id' => 'required',
            'teacher_title' => 'required',
            'teacher_avatar' => 'required'
        ]);

        $data = $request->all();
        $teacher = Teacher::create([
            'teacher_code' => $data['teacher_code'],
            'teacher_name' => $data['teacher_name'],
            'teacher_email' => $data['teacher_email'],
            'teacher_phone' => $data['teacher_phone'],
            'teacher_address' => $data['teacher_address'],
            'teacher_date_of_birth' => $data['teacher_date_of_birth'],
            'teacher_gender' => $data['teacher_gender'],
            'faculty_id' => $data['faculty_id'],
            'teacher_title' => $data['teacher_title'],
            'teacher_avatar' => $data['teacher_avatar']
        ]);
        if ($teacher) {
            return redirect()->back()->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function formUpdateTeacher($teacher_id)
    {
        $teacher = Teacher::where('teacher_id', $teacher_id)->first();
        $faculty = Faculty::get();
        return view('Admin.Teacher.updateTeacher', compact('teacher', 'faculty'));
    }

    public function updateTeacher(Request $request, $teacher_id)
    {
        $teacher = Teacher::where('teacher_id', $teacher_id)->first();
        $request->validate([
            'teacher_code' => [
                'required',
                'min:9',
                'max:9',
                Rule::unique('tbl_teacher')
                    ->ignore($teacher->teacher_code, 'teacher_code')
                //ignore(giá trị bỏ qua, tên cột)
            ],
            'teacher_name' => 'required',
            'teacher_email' => [
                'required',
                'email',
                Rule::unique('tbl_teacher')->ignore($teacher->teacher_email, 'teacher_email')
            ],
            'teacher_phone' => [
                'required',
                'min:10',

                Rule::unique('tbl_teacher')->ignore($teacher->teacher_phone, 'teacher_phone'),
                'numeric'
            ],
            'teacher_address' => 'required',
            'teacher_date_of_birth' => 'required',
            'teacher_gender' => 'required',
            'faculty_id' => 'required',
            'teacher_title' => 'required'
        ]);

        $data = $request->all();
        if ($request->hasFile('teacher_avatar')) {
            $avatar = $request->teacher_avatar;
        } else {
            $avatar = $request->old_teacher_avatar;
        }
        $teacher = Teacher::where('teacher_id', $teacher_id)->update([
            'teacher_code' => $data['teacher_code'],
            'teacher_name' => $data['teacher_name'],
            'teacher_email' => $data['teacher_email'],
            'teacher_phone' => $data['teacher_phone'],
            'teacher_address' => $data['teacher_address'],
            'teacher_date_of_birth' => $data['teacher_date_of_birth'],
            'teacher_gender' => $data['teacher_gender'],
            'faculty_id' => $data['faculty_id'],
            'teacher_title' => $data['teacher_title'],
            'teacher_avatar' => $avatar
        ]);
        if ($teacher !== null) {
            return redirect()->route('admin.teacher.form')->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function searchTeacher(Request $request)
    {
        $searchBy = $request->searchBy;
        $keyword = $request->keyword;
        $query = Teacher::query();
        if ($searchBy == '1') {
            $query->where('teacher_code', $keyword);
        } elseif ($searchBy == '2') {
            $query->Where('teacher_name', 'like', '%' . $keyword . '%');
        } elseif ($searchBy == '3') {
            $query->where('teacher_email', 'like', '%' . $keyword . '%');
        } elseif ($searchBy == '4') {
            $query->where('teacher_phone ', $keyword);
        } elseif ($searchBy == '5') {
            $query->where('teacher_address', 'like', '%' . $keyword . '%');
        } elseif ($searchBy == '6') {
            $query->whereDate('teacher_date_of_birth', $keyword);
        } elseif ($searchBy == '7') {
            $query->whereHas('faculty', function ($query) use ($keyword) {
                $query->where('faculty_name', 'like', '%' . $keyword . '%');
            });
        } elseif ($searchBy == '8') {
            $query->where('teacher_title', 'like', '%' . $keyword . '%');
        }
        $teachers = $query->paginate(10);
        if ($teachers->isEmpty()) {
            $error = 'No matching data found';
            return view('Admin.Teacher.searchTeacher', compact('searchBy', 'keyword', 'error'));
        }
        return view('Admin.Teacher.searchTeacher', compact('teachers', 'keyword', 'searchBy'));
    }

    public function deleteTeacher(Request $request)
    {
        if ($request->has('selected_items')) {
            $selectedItems = $request->selected_items;
            $deleteTeacher = Teacher::whereIn('teacher_id', $selectedItems)->delete();
            if ($deleteTeacher) {
                return response()->json(['success' => 'Teacher deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to delete teachers'], 500);
            }
        }
    }

    public function exportTeacher()
    {
        return Excel::download(new TeachersExport, 'list-teacher-export.xlsx');
    }

    public function teamplateExport()
    {
        return Excel::download(new TemplateTeacher, 'template-list-teacher-export.xlsx');
    }

    public function formImportTeachers()
    {
        return view('Admin.Teacher.importTeacher');
    }

    public function importTeachers(Request $request)
    {
        if ($request->hasFile('import-teachers')) {
            $file = $request->file('import-teachers');
            $filePath = $file->getPathname();
            try {
                Excel::import(new TeachersImport, $filePath);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Data import failed');
            }
            return redirect()->back()->with('success', 'Enter data successfully');
        } else {
            return redirect()->back()->with('error', 'File does not exist');
        }
    }
}
