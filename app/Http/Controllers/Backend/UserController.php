<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(4);
        return view('backend.pages.users.index', compact('users'));

    }

    public function insert(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('backend.pages.users.create');
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:3|max:150',
                'username' => 'required|min:3|max:20|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:3|max:20|confirmed',
                'password_confirmation' => 'required',
                'gender' => 'required',
                'user_type' => 'required',
                'image' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $data['name'] = $request->name;
            $data['username'] = $request->username;
            $data['email'] = $request->email;
            $data['password'] = bcrypt($request->password);
            $data['gender'] = $request->gender;
            $data['user_type'] = $request->user_type;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/users');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->back();
                }
                $data['image'] = $imageName;

            }

            if (User::create($data)) {
                return redirect()->route('users')->with('success', 'data was inserted');
            } else {
                return redirect()->back()->with('error', 'there was problems ');
            }


        }
    }
}
