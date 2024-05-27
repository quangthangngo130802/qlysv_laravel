<?php

namespace App\Http\Controllers\Qldt;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\PasswordResetToken;
use App\Models\StudentAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class LoginController extends Controller
{
    public function form()
    {
        return view('Qldt.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $result = Auth::guard('user')->attempt($credentials);
        if ($result) {
            return redirect()->route('user.post.form');
        } else {
            return redirect()->back()->with('error', 'The e-mail/password provided is incorrect.');
        }
    }
    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('user.login.form');
    }

    public function formchangePassword()
    {
        return view('Qldt.ChangePassWordStudent');
    }

    public function changePassword(Request $request)
    {
        $user = Auth::guard('user')->user();
        $txtPassword = $user->password;
        $txtOldPassword = $request->txtOldPassword;

        if (Hash::check($txtOldPassword, $txtPassword)) {
            $changepassword = StudentAccount::where('student_account_id', $user->student_account_id)
                ->update([
                    'password' => bcrypt($request->txtNewPassWord)
                ]);
            if ($changepassword !== null) {
                return redirect()->back()->with('success', 'Password update successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to update Password');
            }
        } else {
            return redirect()->back()->with('error', 'Old password does not match');
        }
    }

    public function forgotPasswordForm(){
        return view('Qldt.forgotPassword');
    }

    public function forgotPassword(Request $request){
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Email may not be empty.',
            'email.email' => 'Email address is not valid.'
        ]);

        $user = StudentAccount::where('email', $request->email)->first();
        if ($user !== null) {
            $token = Str::random(50);
           // dd($token);
            $tokenData = [
                'token' => $token,
                'email' => $request->email
            ];
            if (PasswordResetToken::create($tokenData)) {
                Mail::to($request->email)->send(new ForgotPassword($user, $token));
                return redirect()
                    ->back()->withErrors(['email' => 'Please check email']);
            }
        } else {
            return redirect()
                ->back()->withErrors(['email' => 'Email does not exist']);
        }

        return view('Qldt.forgotPassword');
    }

    public function resetPasswordForm($token){

        return view('Qldt.ResetPassword', compact('token'));

    }

    public function resetPassword(Request $request){
        $request->validate([
            'password' => 'required',
            'password2' => 'required|same:password'
        ], [
            'password.required' => 'Password may not be empty.',
            'password2.required' => 'Confirm Password may not be empty.',
            'password2.same' => 'Confirm passwords do not match.'

        ]);
        $tokenData = PasswordResetToken::where('token', $request->token)->first();
        if (!$tokenData) {
            return redirect()->back()->withErrors(['email' => 'Invalid password reset token']);
        }
        $user = $tokenData->user;  // hàm ->user ở trong Model

        $data = [
            'password' => bcrypt($request->password)
        ];
        $check = $user->update($data);
        PasswordResetToken::destroy($tokenData->id);

        if ($check) {
            return redirect()->route('user.login.form');
        }
        return redirect()
            ->back()->withErrors(['email' => 'Invalid username or password']);

    }
}
