<?php

use Illuminate\Support\Facades\Route;
use App\Models\TheLoai;
use App\Http\Controllers\TheloaiController;
use App\Http\Controllers\LoaiTinController;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AjaxController;

use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//=======================================================
//========================= PUBLIC ======================
//=======================================================
Route::get('/', [PageController::class,'hompage'])->name('homePage');
Route::get('tintuc/{id}/{title_unsigned}.html', [PageController::class,'newDetail']);
Route::post('comment/{id}', [CommentController::class, 'postComment'])->name('postComment');
// Route::post('sign-in', [PageController::class, 'SignIn']);
Route::post('loginAjax', [PageController::class, 'loginAjax'])->name('loginAjax');
Route::post('loginUser', [PageController::class, 'loginUser'])->name('loginUser');
Route::get('logOut', [PageController::class, 'logOut'])->name('logOut');



//=======================================================
//========================= ADMIN =======================
//=======================================================

// LOGIN
Route::get('admin/login', [UserController::class,'getLogin'])->name('getLogin');
Route::post('admin/login', [UserController::class,'postLogin'])->name('postLogin');
Route::get('admin/logout', [UserController::class,'getLogout'])->name('getLogout');

// Admin
Route::group(['prefix' => 'admin', 'middleware'=>'adminLogin'], function () {

    // THE LOAI
    Route::group(['prefix' => 'theloai'], function () {
        Route::get('list', [TheloaiController::class,'getList'])->name('theloaiList');
        Route::get('add', [TheloaiController::class,'getAdd'])->name('theloaigetAdd');
        Route::post('add', [TheloaiController::class,'postAdd'])->name('theloaipostAdd');
        Route::get('edit/{id}', [TheloaiController::class,'getEdit'])->name('theloaigetEdit');
        Route::post('edit/{id}', [TheloaiController::class,'postEdit'])->name('theloaipostEdit');
        Route::get('del/{id}', [TheloaiController::class,'getDel']);
    });

    // LOAI TIN
    Route::group(['prefix' => 'loaitin'], function () {
        Route::get('list', [LoaiTinController::class,'getList'])->name('loaitinList');
        Route::get('add', [LoaiTinController::class,'getAdd'])->name('loaitingetAdd');
        Route::post('add', [LoaiTinController::class,'postAdd'])->name('loaitinpostAdd');
        Route::get('edit/{id}', [LoaiTinController::class,'getEdit'])->name('loaitingetEdit');
        Route::post('edit/{id}', [LoaiTinController::class,'postEdit'])->name('loaitinpostEdit');
        Route::get('del/{id}', [LoaiTinController::class,'getDel']);
    });

    // TIN TUC
    Route::group(['prefix' => 'tintuc'], function () {
        Route::get('list', [TinTucController::class,'getList'])->name('tintucList');
        Route::get('add', [TinTucController::class,'getAdd'])->name('tintucgetAdd');
        Route::post('add', [TinTucController::class,'postAdd'])->name('tintucpostAdd');
        Route::get('edit/{id}', [TinTucController::class,'getEdit'])->name('tintucgetEdit');
        Route::post('edit/{id}', [TinTucController::class,'postEdit'])->name('tintucpostEdit');
        Route::get('del/{id}', [TinTucController::class,'getDel']);
    });

    // SLIDE
    Route::group(['prefix' => 'slide'], function () {
        Route::get('list', [SlideController::class,'getList'])->name('slideList');
        Route::get('add', [SlideController::class,'getAdd'])->name('slidegetAdd');
        Route::post('add', [SlideController::class,'postAdd'])->name('slidepostAdd');
        Route::get('edit/{id}', [SlideController::class,'getEdit'])->name('slidegetEdit');
        Route::post('edit/{id}', [SlideController::class,'postEdit'])->name('slidepostEdit');
        Route::get('del/{id}', [SlideController::class,'getDel']);
    });

    // USER
    Route::group(['prefix' => 'user'], function () {
        Route::get('list', [UserController::class,'getList'])->name('userList');
        Route::get('add', [UserController::class,'getAdd'])->name('usergetAdd');
        Route::post('add', [UserController::class,'postAdd'])->name('userpostAdd');
        Route::get('edit/{id}', [UserController::class,'getEdit'])->name('usergetEdit');
        Route::post('edit/{id}', [UserController::class,'postEdit'])->name('userpostEdit');
        Route::get('del/{id}', [UserController::class,'getDel']);
    });

    // COMMENT
    Route::group(['prefix' => 'comment'], function () {
        Route::get('list/{id}', [CommentController::class,'getList'])->name('commentList');
        Route::get('list/del/{id}', [CommentController::class,'getDel'])->name('commentDel');
    });

    // AJAX
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('loaitin/{id}', [AjaxController::class,'getLoaiTin'])->name('ajaxgetloaitin');
    });

});