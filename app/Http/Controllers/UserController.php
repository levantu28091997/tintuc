<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getList(){
        $user = User::all();
        return view('admin.user.list', ['user'=>$user]);
    }
    public function getAdd(){
        return view('admin.user.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'name' => 'required|min:2|max:100',
                'email' => 'required|unique:users|email',
                'password' => 'required|min:6|max:15',
            ],
            [
                'name.required' => 'The name field cannot be left blank',
                'email.required' => 'The email field cannot be left blank',
                'password.required' => 'The password field cannot be left blank',
                'name.min' => 'Names must be between 3 and 100 characters in length',
                'name.max' => 'Names must be between 3 and 100 characters in length',
                'email.unique' => 'Email cannot be duplicated',
                'email.email' => 'Email invalidate',
                'password.min' => 'Names must be between 6 and 15 characters in length',
                'password.max' => 'Names must be between 6 and 15 characters in length',
            ]
        );
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = 2;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('userpostAdd')->with('notifi', 'Add User successful');
    }
    public function getEdit($id){
        $user = User::find($id);
        return view('admin.user.edit', ['user'=>$user]);
    }
    public function postEdit(Request $request, $id){
        $user = User::find($id);
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100'
            ],
            [
                'name.required' => 'The name field cannot be left blank',
                'name.min' => 'Names must be between 3 and 100 characters in length',
                'name.max' => 'Names must be between 3 and 100 characters in length',
            ]
        );
        $user->name = $request->name;
        $user->save();
        return redirect()->route('userpostEdit', $id)->with('notifi', 'Edit User successful');
    }
    public function getDel($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->route('userList')->with('notifi', 'Delete User Successfull');
    }

    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $request){
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:15',
            ],
            [
                'email.required' => 'The email field cannot be left blank',
                'password.required' => 'The password field cannot be left blank',
                'password.min' => 'Names must be between 6 and 15 characters in length',
                'password.max' => 'Names must be between 6 and 15 characters in length',
            ]        
        );
        if (Auth::attempt(['email' => $request->email, 'password' =>$request->password])) {
            return redirect()->route('theloaiList');
        }else{
            return redirect()->route('postLogin')->with('Login Fail');
        }
    }
}
