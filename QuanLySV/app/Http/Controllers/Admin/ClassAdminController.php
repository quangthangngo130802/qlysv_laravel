<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classs;
use App\Models\Course;
use App\Models\Major;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClassAdminController extends Controller
{
    public function formClass()
    {
        $class = Classs::with('major')->with('teacher')->with('course')
            ->orderBy('class_id', 'DESC')
            ->paginate(10);
        return view('Admin.Class.listClass', compact('class'));
    }

    public function formAddClass()
    {
        $major = Major::get();
        $teacher = Teacher::whereNotIn('teacher_id', function ($query) {
            $query->select('homeroom_teacher')->from('tbl_class');
        })->get();
        $course = Course::get();
        return view('Admin.Class.addClass', compact('major', 'teacher', 'course'));
    }

    public function addClass(Request $request)
    {
        $request->validate([
            'class_code' => 'required|unique:tbl_class,class_code',
            'class_name' => 'required|unique:tbl_class,class_name',
            'major_id' => 'required',
            'homeroom_teacher' => 'required|unique:tbl_class,homeroom_teacher',
            'course_id' => 'required'
        ]);
        $class = Classs::create([
            'class_code' => $request->class_code,
            'class_name' => $request->class_name,
            'major_id' => $request->major_id,
            'homeroom_teacher' => $request->homeroom_teacher,
            'course_id' => $request->course_id
        ]);
        if ($class !== null) { // laravel sẽ tự chuyển đổi thành true/false nên có thể dùng if($student)
            return redirect()->back()->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function formUpdateClass($class_id)
    {
        $major = Major::get();
        $class = Classs::where('class_id', $class_id)->first();
        $teacher = Teacher::whereNotIn('teacher_id', function ($query) use ($class) {
            $query->select('homeroom_teacher')
                  ->from('tbl_class')
                  ->where('homeroom_teacher', '!=', $class->homeroom_teacher);
        })->get();

        $course = Course::get();

        return view('Admin.Class.updateClass', compact('class', 'major', 'teacher', 'course'));
    }

    public function updateClass(Request $request, $class_id)
    {
        $class = Classs::where('class_id', $class_id)->first();
        $request->validate([
            'class_code' => [
                'required',
                Rule::unique('tbl_class')->ignore($class->class_code, 'class_code')
                // unique:tbl_class,class_code',
            ],
            'class_name' => [
                'required',
                Rule::unique('tbl_class')->ignore($class->class_name, 'class_name')
            ],
            'major_id' => 'required',
            'homeroom_teacher' => [
                'required',
                Rule::unique('tbl_class')->ignore($class->homeroom_teacher, 'homeroom_teacher')
            ],
            'course_id' => 'required'
        ]);

        $class = Classs::where('class_id', $class_id)->update([
            'class_code' => $request->class_code,
            'class_name' => $request->class_name,
            'major_id' => $request->major_id,
            'homeroom_teacher' => $request->homeroom_teacher,
            'course_id' => $request->course_id
        ]);
        if ($class !== null) {
            return redirect()->route('admin.class.form')->with('success', 'Data has been processed successfully.');
        }
        return redirect()->route('admin.class.form')->with('error', 'Data processing failed. Please try again.');
    }

    public function deleteClass(Request $request)
    {
        if ($request->has('selected_items')) {
            $selectedItems = $request->selected_items;
            $class = Classs::whereIn('class_id', $selectedItems)->delete();
            if ($class) {
                return response()->json(['success' => 'Classroom deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to delete classroom'], 500);
            }
        }
    }

    public function searchClass(Request $request)
    {
        $keyword = $request->keyword;
        $searchBy = $request->searchBy;
        $query = Classs::query();
        if ($searchBy == '1') {
            $query->where('class_code', $keyword);
        } elseif ($searchBy == '2') {
            $query->Where('class_name', 'like', '%' . $keyword . '%');
        } elseif ($searchBy == '3') {
            $query->whereHas('teacher', function ($query) use ($keyword) {
                $query->where('teacher_name', 'like', '%' . $keyword . '%');
            });
        }
        $class = $query->paginate(10);
        if ($class->isEmpty()) {
            $error = 'No matching data found';
            return view('Admin.Class.searchClass', compact('searchBy', 'keyword', 'error'));
        }
        return view('Admin.Class.searchClass', compact('class', 'keyword', 'searchBy'));
    }
}
