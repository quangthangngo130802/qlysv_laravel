<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Major;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function formDashBoard()
    {
        $totalStudent = Student::count();
        $totalTeacher = Teacher::count();
        $totalFaculty = Faculty::count();
        $totalMajor = Major::count();
        return view('Admin.DashBoard.dashboard', compact('totalStudent', 'totalTeacher', 'totalFaculty', 'totalMajor'));
    }
}
