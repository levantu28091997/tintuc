<?php

namespace App\Http\Controllers;

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
    public function getDel($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->route('userList')->with('notifi', 'Delete User Successfull');
    }
}
