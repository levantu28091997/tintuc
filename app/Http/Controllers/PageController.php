<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\Slide;

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
        return view('pages.homepage');
    }
}
