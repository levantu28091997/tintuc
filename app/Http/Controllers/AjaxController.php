<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTin;

class AjaxController extends Controller
{
    public function getLoaiTin($id){
        $loaitin = LoaiTin::where('id_theloai', $id)->get();
        // dd('hjgh'.$loaitin);
        foreach ($loaitin as $key => $item) {
            echo "<option value='$item->id'>$item->name</option>";
        }
    }
}
