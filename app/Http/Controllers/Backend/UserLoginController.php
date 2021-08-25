<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
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
}
