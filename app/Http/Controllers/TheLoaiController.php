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
    public function getEdit($id){
        $theloai = TheLoai::find($id);
        return view('admin.theloai.edit', ['theloai'=>$theloai]);
    }
    public function postEdit(Request $request, $id){

        $this->validate($request,
            [
                'name' => 'required|unique:loaitin|min:3|max:100',
            ],
            [
                'name.required' => 'The name field cannot be left blank',
                'name.unique' => 'Names cannot be duplicated',
                'name.min'=> 'Names must be between 3 and 100 characters in length',
                'name.max'=> 'Names must be between 3 and 100 characters in length',
            ]
        );
        $theloai = TheLoai::find($id);
        $theloai->name = $request->name;
        $theloai->name_unsigned = Str::slug($request->name, '-');
        $theloai->save();

        return redirect()->route('theloaipostEdit',$request->id)->with('notifi', 'Edit Categories successful');

    }
    public function getDel($id){

        $theloai = TheLoai::find($id);
        $theloai->delete();

        return redirect()->route('theloaiList')->with('notifi', 'Delete Categories successful');

    }
}
