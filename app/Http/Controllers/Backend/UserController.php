<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function deleteFile($id)
    {
        $user = User::findOrFail($id);
        $userImage = public_path('uploads/users/' . $user->image);
        if (file_exists($userImage) && is_file($userImage)) {
            unlink($userImage);
            return true;
        }
        return true;
    }

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

    public function edit(Request $request)
    {
        $id = $request->criteria;
        $userData = User::findOrFail($id);
        return view('backend.pages.users.edit', compact('userData'));
    }

    public function editAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {

            $id = $request->criteria;

            $this->validate($request, [
                'name' => 'required|min:3|max:150',
                'username' => 'required|min:3|max:20|', [
                    Rule::unique('users', 'username')->ignore($id)
                ],
                'email' => 'required|email|', [
                    Rule::unique('users', 'email')->ignore($id)
                ],
                'gender' => 'required',
                'user_type' => 'required',
                'image' => 'mimes:jpg,jpeg,png,gif'
            ]);

            $data['name'] = $request->name;
            $data['username'] = $request->username;
            $data['email'] = $request->email;
            $data['gender'] = $request->gender;
            $data['user_type'] = $request->user_type;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/users');
                if ($this->deleteFile($id) && $file->move($uploadPath, $imageName)) {
                    $data['image'] = $imageName;
                }

            }

            if (User::findOrFail($id)->update($data)) {
                return redirect()->route('users')->with('success', 'data was update');
            } else {
                return redirect()->back()->with('error', 'there was problems ');
            }


        }
    }

    public function delete(Request $request)
    {
        $id = $request->criteria;
        $userObj = User::findOrFail($id);
        if ($this->deleteFile($id) && $userObj->delete()) {
            return redirect()->back()->with('success', 'user was deleted');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }
    }

    public function updateUserStatus(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        };

        $id = $request->criteria;

        $obj = User::findOrFail($id);

        if (isset($_POST['active'])) {
            $obj->status = 0;
            $message = 'status was inactive';
        }

        if (isset($_POST['inactive'])) {
            $obj->status = 1;
            $message = 'status was active';
        }

        if ($obj->update()) {
            return redirect()->back()->with('success', $message);
        } else {
            return redirect()->back();
        }
    }
}
