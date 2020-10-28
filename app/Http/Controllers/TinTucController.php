<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTin;
use App\Models\TinTuc;
use App\Models\TheLoai;
use Illuminate\Support\Str;

class TinTucController extends Controller
{
    public function getList(){
        $tintuc = TinTuc::orderBy('id', 'DESC')->get();
        return view('admin.tintuc.list',['tintuc'=>$tintuc]);
    }
    public function getAdd(){
        $loaitin = LoaiTin::all();
        $theloai = TheLoai::all();
        return view('admin.tintuc.add', ['loaitin'=>$loaitin, 'theloai'=>$theloai]);
    }
    public function postAdd(Request $request){
        
        $this->validate($request,
            [
                'title' => 'required|unique:tintuc|min:3|max:100',
                'description' => 'required|min:3|max:150',
                'content' => 'required|min:3',
                'id_loaitin' => 'required',
            ],
            [
                'title.required' => 'The Title field cannot be left blank',
                'title.unique' => 'Title cannot be duplicated',
                'title.min'=> 'Title must be between 3 and 100 characters in length',
                'title.max'=> 'Title must be between 3 and 100 characters in length',
                'description.required' => 'The Description field cannot be left blank',
                'description.min'=> 'Description must be between 3 and 150 characters in length',
                'description.max'=> 'Description must be between 3 and 150 characters in length',
                'content.required' => 'The Content field cannot be left blank',
                'content.min'=> 'The Content must be 3 characters long',
                'id_loaitin.required' => 'The Type of new field cannot be left blank',
            ]
        );

        $tintuc = new TinTuc;
        $tintuc->title = $request->title;
        $tintuc->title_unsigned = Str::slug($request->title, '-');
        $tintuc->id_loaitin = $request->id_loaitin;
        $tintuc->description = $request->description;
        $tintuc->content = $request->content;
        $tintuc->image = $request->image;
        $tintuc->features = $request->features ?? 0;
        $tintuc->views = 0;
        $tintuc->save();

        return redirect()->route('tintucpostAdd')->with('notifi','Add New successful');
        
    }
}
