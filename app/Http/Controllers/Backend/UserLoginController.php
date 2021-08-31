<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetMail;
use App\Models\User;
use App\Models\UserPasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserLoginController extends Controller
{

    public function index(Request $request)
    {
        return view('backend.login.index');

    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $password = $request->password;

        $remember_me = $request->remember_me ? true : false;

        if (Auth::attempt(['username' => $username, 'password' => $password], $remember_me)) {
            return redirect()->intended(route('dashboard'));
        } else {
            return redirect()->back()->with('error', 'invalid access');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended(route('login'));
    }

    public function passwordReset(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('backend.login.password-reset');

        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email' => 'required|email',
            ], [
                'email.required' => 'Please enter email address'
            ]);

            $email = $request->email;

            $getData = User::where('email', '=', $email)->count();
            if ($getData > 0) {
                $token = bcrypt(microtime());
                $sendUrl = url("password-reset-link?_token=$token&email=$email");
                $data['token'] = $token;
                $data['email'] = $email;
                $user = UserPasswordReset::create($data);
                $data['users'] = $user;
                $data['sendUrl'] = $sendUrl;
                Mail::to($user->email)->send(new PasswordResetMail($data));
                return redirect()->back()->with('success', 'Please click on the link');


            } else {
                return redirect()->back()->with('error', 'invalid access');
            }


        }
    }


    public function passwordResetLink(Request $request)
    {
        $token = $request->_token;
        $email = $request->email;
        if ($request->isMethod('get')) {
            $getTokenAndEmail = UserPasswordReset::where('token', '=', $token)
                ->where('email', '=', $email)->count();

            if ($getTokenAndEmail > 0) {
                return view('backend.login.reset');
            } else {
                echo "no";
            }
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'password' => 'required|min:3|max:20|confirmed',
                'password_confirmation' => 'required'
            ]);

            $objUser = User::where('email', '=', $email)->first();
            $objUser->password = bcrypt($request->password);
            $objUser->update();
            UserPasswordReset::where('email', '=', $email)->delete();
            return redirect()->route('login')->with('success', 'password was successfully reset');

        }

    }
}
