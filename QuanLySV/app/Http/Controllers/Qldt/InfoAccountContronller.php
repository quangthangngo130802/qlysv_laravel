<?php

namespace App\Http\Controllers\Qldt;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class InfoAccountContronller extends Controller
{
    public function form()
    {
        $user = Auth::guard('user')->user();

        $student = Student::with('class')->where('student_id', $user->student_id)->first();
        return view('Qldt.info', compact('student'));
    }

    public function update(Request $request)
    {
        $user = Auth::guard('user')->user();

        $student = Student::where('student_id', $user->student_id)->first();
        $request->validate([
            'address' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('tbl_student')->ignore($student->email, 'email')
            ],
            'phone' => [
                'required',
                'integer',
                'digits:10',
                Rule::unique('tbl_student')->ignore($student->phone, 'phone'),
                'numeric'
            ],

        ]);
        $data = $request->all();
        $student = Student::where('student_id', $user->student_id)->update([
            'address' => $data['address'],
            'email' => $data['email'],
            'phone' => $data['phone']

        ]);
        if ($student !== null) {
            return redirect()->back()->with('success', 'Data has been processed successfully.');
        } else {
            return redirect()->back()->with('error', 'Data processing failed. Please try again.');
        }
    }
}
