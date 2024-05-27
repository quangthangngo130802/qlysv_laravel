<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function form()
    {
        $course = Course::orderBy('course_id', 'DESC')
            ->get();
        return view('Admin.Chart.pie', compact('course'));
    }
    public function pieChart($id)
    {
        $maleCount = Student::whereHas('class', function ($query) use ($id) {
            $query->where('course_id', $id);
        })->where('gender', 'male')->count();

        $femaleCount = Student::whereHas('class', function ($query) use ($id) {
            $query->where('course_id', $id);
        })->where('gender', 'female')->count();

        return response()->json([
            'male' => $maleCount,
            'female' => $femaleCount,
        ]);
    }
}
