<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CourseAdminController extends Controller
{
    public function formCourse()
    {
        $courses = Course::orderBy('course_id', 'DESC')->paginate(10);
        return view('Admin.Course.listCourse', compact('courses'));
    }

    public function addCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_name' => 'unique:tbl_course,course_name',
            'year_of_admission' => 'unique:tbl_course,year_of_admission'
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return redirect()->back()->with('error', $error);
        }
        $course = Course::create([
            'course_name' => $request->course_name,
            'year_of_admission' => $request->year_of_admission
        ]);
        if ($course !== null) {
            return redirect()->back()->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }

    public function formUpdateCourse($course_id)
    {
        $course = Course::where('course_id', $course_id)->first();
        return view('Admin.Course.updateCourse', compact('course'));
    }

    public function updateCourse(Request $request, $course_id)
    {
        $course = Course::where('course_id', $course_id)->first();
        $request->validate([
            'course_name' => [
                'required',
                Rule::unique('tbl_course')->ignore($course->course_name, 'course_name')
            ],
            'year_of_admission' => [
                'required',
                Rule::unique('tbl_course')->ignore($course->year_of_admission, 'year_of_admission'),
            ]
        ]);

        $course = Course::where('course_id', $course_id)->update([
            'course_name' => $request->course_name,
            'year_of_admission' => $request->year_of_admission
        ]);

        if ($course !== null) {
            return redirect()->route('admin.course.form')->with('success', 'Data has been processed successfully.');
        }
        return redirect()->route('admin.course.form')->with('error', 'Data processing failed. Please try again.');
    }

    public function deleteCourse(Request $request)
    {
        if ($request->has('selected_items')) {
            $selectedItems = $request->selected_items;
            $class = Course::whereIn('course_id', $selectedItems)->delete();
            if ($class) {
                return response()->json(['success' => 'Course deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to delete course'], 500);
            }
        }
    }
}
