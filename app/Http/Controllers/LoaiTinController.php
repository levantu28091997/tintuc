<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTin;
use App\Models\TheLoai;
use Illuminate\Support\Str;

class LoaiTinController extends Controller
{
    public function getList(){
        $loaitin = LoaiTin::all();
        return view('admin.loaitin.list',['loaitin'=>$loaitin]);
    }
    public function getAdd(){
        $theloai = TheLoai::all();
        return view('admin.loaitin.add', ['theloai'=>$theloai]);
    }
    public function postAdd(Request $request){
        
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

        $loaitin = new LoaiTin;
        $loaitin->name = $request->name;
        $loaitin->id_theloai = $request->id_theloai;
        $loaitin->name_unsigned = Str::slug($request->name, '-');
        $loaitin->save();

        return redirect()->route('loaitinpostAdd')->with('notifi','Add Type of new successful');
        
    }
    public function getEdit($id){
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::find($id);
        return view('admin.loaitin.edit', ['loaitin'=>$loaitin, 'theloai'=>$theloai]);
    }
    public function postEdit(Request $request, $id){

        $this->validate($request,
            [
                'name' => 'required|min:3|max:100',
                'id_theloai' => 'required',
            ],
            [
                'name.required' => 'The name field cannot be left blank',
                'name.min'=> 'Names must be between 3 and 100 characters in length',
                'name.max'=> 'Names must be between 3 and 100 characters in length',
                'id_theloai.required' => 'The Categories field cannot be left blank',
            ]
        );
        $loaitin = LoaiTin::find($id);
        $loaitin->name = $request->name;
        $loaitin->id_theloai = $request->id_theloai;
        $loaitin->name_unsigned = Str::slug($request->name, '-');
        $loaitin->save();

        return redirect()->route('loaitinpostEdit',$request->id)->with('notifi', 'Edit Type of new successful');

    }
    public function getDel($id){

        $loaitin = LoaiTin::find($id);
        $loaitin->delete();

        return redirect()->route('loaitinList')->with('notifi', 'Delete Type of new successful');

    }
}
