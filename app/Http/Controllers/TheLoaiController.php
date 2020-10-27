<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use Illuminate\Support\Str;

class TheLoaiController extends Controller
{
    public function getList(){
        $theloai = TheLoai::all();
        return view('admin.theloai.list',['theloai'=>$theloai]);
    }
    public function getAdd(){
        return view('admin.theloai.add');
    }
    public function postAdd(Request $request){
        
        $this->validate($request,
            [
                'name' => 'required|unique:theloai|min:3|max:100',
            ],
            [
                'name.required' => 'Name khong duoc bo trong',
                'name.unique' => 'Name khong duoc trung',
                'name.min'=> 'Name phai co do dai tu 3 den 100 ki tu',
                'name.max'=> 'Name phai co do dai tu 3 den 100 ki tu',
            ]
        );

        $theloai = new TheLoai;
        $theloai->name = $request->name;
        $theloai->name_unsigned = Str::slug($request->name, '-');
        $theloai->save();

        return redirect()->route('theloaipostAdd')->with('notifi','Add Categories successful');
        
    }
    public function getEdit(){
        return view('admin.theloai.edit');
    }
}
