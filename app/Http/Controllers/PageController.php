<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\Slide;
use App\Models\TinTuc;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    public function newDetail($id){
        $tin = TinTuc::find($id);
        return view('pages.tintuc-detail', ['tin'=>$tin]);
    }
    public function SignIn(Request $request){
        $this->validate($request,
            [
                'email' => 'required|min:2|max:100|email',
                'password' => 'required|min:6|max:15',
            ],
            [
                'email.required' => 'Email không được để trống',
                'email.min' => 'Email có độ dài từ 2 đến 100 kí tự',
                'email.max' => 'Email có độ dài từ 2 đến 100 kí tự',
                'email.email' => 'Định dạng email không hợp lệ',
                'password.required' => 'Password không được để trống',
                'password.min' => 'Password có độ dài từ 6 đến 15 kí tự',
                'password.max' => 'Password có độ dài từ 6 đến 15 kí tự',
            ]
        );
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return true;
        }else{
            return false;
        }
    }
    public function loginAjax(Request $request){
        dd($request);
    }
}
