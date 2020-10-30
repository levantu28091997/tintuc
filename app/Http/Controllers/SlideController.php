<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    public function getList(){
        $slide = Slide::all();
        return view('admin.slide.list', ['slide'=>$slide]);
    }
    public function getAdd(){
        return view('admin.slide.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100',
                'content' => 'required|min:5',
                'link' => 'required|min:3'
            ],
            [
                'name.required' => 'The Name field cannot be left blank',
                'content.required' => 'The Content field cannot be left blank',
                'link.required' => 'The Link field cannot be left blank',
                'name.min' => 'Name must be between 3 and 100 characters in length',
                'name.max' => 'Name must be between 3 and 100 characters in length',
                'content.min' => 'Content must be between 3 and 100 characters in length',
                'link.min' => 'Link must be between 3 and 100 characters in length',
            ]
        );

        $slide =  new Slide;
        $slide->name = $request->name;
        $slide->content = $request->content;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $format = $file->getClientOriginalExtension();
            if ($format != 'png' && $format != 'jpg' && $format != 'jpeg') {
                return redirect()->route('slidepostAdd')->with('error', 'Please choose the correct image format: png, jpg, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while (file_exists('upload/slide/'.$name)) {
                $image = Str::random(4)."_".$name;
            }
            $file->move("upload/slide", $image);
            $slide->image = $image;
        }else{
            $slide->image = '';
        }
        $slide->link =$request->link;
        $slide->save();

        return redirect()->route('slidepostAdd')->with('notifi', 'Add Slide Successful');
    }
    public function getEdit($id){
        $slide = Slide::find($id);
        return view('admin.slide.edit', ['slide'=>$slide]);
    }
    public function postEdit(Request $request, $id){
        $slide = Slide::find($id);
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100',
                'content' => 'required|min:5',
                'link' => 'required|min:3'
            ],
            [
                'name.required' => 'The Name field cannot be left blank',
                'content.required' => 'The Content field cannot be left blank',
                'link.required' => 'The Link field cannot be left blank',
                'name.min' => 'Name must be between 3 and 100 characters in length',
                'name.max' => 'Name must be between 3 and 100 characters in length',
                'content.min' => 'Content must be between 3 and 100 characters in length',
                'link.min' => 'Link must be between 3 and 100 characters in length',
            ]
        );
        $slide->name = $request->name;
        $slide->content = $request->content;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $format = $file->getClientOriginalExtension();
            if($format != 'png' && $format != 'jpg' && $format != 'jpge'){
                return redirect()->route('slidepostEdit', $id)->with('error', 'Please choose the correct image format: png, jpg, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while (file_exists("upload/slide".$name)) {
                $image = Str::random(4)."_".$name;
            }
            $file->move("upload/slide", $image);
            unlink("upload/slide/".$slide->image);
            $slide->image = $image;

        }
        $slide->link = $request->link;
        $slide->save();

        return redirect()->route('slidepostEdit', $id)->with('notifi', 'Edit Slide Successfull');
    }
    public function getDel($id){
        $slide = Slide::find($id);
        return redirect()->route('slideList')->with('notifi', 'Delete Slide Successfull');
    }
}
