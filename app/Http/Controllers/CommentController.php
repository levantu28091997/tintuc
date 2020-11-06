<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTin;
use App\Models\TinTuc;
use App\Models\TheLoai;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
    public function postComment(Request $request, $id){
        // dd('Anhtu');
        $comment = new Comment;
        $tintuc = TinTuc::find($id);
        $comment->content = $request->content;
        $comment->id_user = Auth::user()->id;
        $comment->id_tintuc = $id;
        $comment->save();

        return redirect("tintuc/".$id."/".$tintuc->title_unsigned.".html");
    }
}
