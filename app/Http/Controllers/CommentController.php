<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTin;
use App\Models\TinTuc;
use App\Models\TheLoai;
use App\Models\Comment;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function getList(Request $request, $id){
        $comment = Comment::where('id_tintuc', $id)->get();
        return view('admin/comment/list',['comment'=>$comment]);
    }
    public function getDel($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('commentList', $id)->with('notifi','Delete New successful');
    }
}
