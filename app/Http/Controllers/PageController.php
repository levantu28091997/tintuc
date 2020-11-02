<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;

class PageController extends Controller
{
    public function hompage(){
        $theloai = TheLoai::all();
        return view('pages.homepage', ['theloai'=>$theloai]);
    }
}
