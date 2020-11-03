<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\Slide;
use App\Models\TinTuc;

class PageController extends Controller
{
    public function __construct(){
        $theloai = TheLoai::all();
        $slide = Slide::all();
        view()->share('theloai',$theloai);
        view()->share('slide',$slide);
        // dd('Hello');
    }
    public function hompage(){
        $tintuc = TinTuc::take(8)->get();
        return view('pages.homepage',['tintuc'=>$tintuc]);
    }
}
