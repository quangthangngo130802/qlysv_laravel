<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeacherAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{

    public function formLogin()
    {
        return view('Admin.Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('admin_email', 'password');
        $result = Auth::guard('admin')->attempt($credentials);
        if ($result) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error', 'The e-mail/password provided is incorrect.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login.form');
    }

    public function formRegister()
    {
        return view('Admin.Auth.register');
    }


}
