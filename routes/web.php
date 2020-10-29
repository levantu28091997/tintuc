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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/thu', function () {
    $theloai = TheLoai::find(3);
    foreach ($theloai->tintuc as $loaitin) {
        echo $loaitin . '<br>';
    }
});

Route::get('/admin/index', function () {
    return view('admin/index');
});


// Admin

Route::group(['prefix' => 'admin'], function () {

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
        Route::get('list', [TinTucController::class,'getList']);
        Route::get('list', [TinTucController::class,'getList'])->name('tintucList');
        Route::get('add', [TinTucController::class,'getAdd'])->name('tintucgetAdd');
        Route::post('add', [TinTucController::class,'postAdd'])->name('tintucpostAdd');
        Route::get('edit/{id}', [TinTucController::class,'getEdit'])->name('tintucgetEdit');
        Route::post('edit/{id}', [TinTucController::class,'postEdit'])->name('tintucpostEdit');
        Route::get('del/{id}', [TinTucController::class,'getDel']);
    });

    // SLIDE
    Route::group(['prefix' => 'slide'], function () {
        Route::get('list', [SlideController::class,'getList']);
        Route::get('add', [SlideController::class,'getAdd']);
        Route::get('edit', [SlideController::class,'getEdit']);
    });

    // USER
    Route::group(['prefix' => 'user'], function () {
        Route::get('list', [UserController::class,'getList']);
        Route::get('add', [UserController::class,'getAdd']);
        Route::get('edit', [UserController::class,'getEdit']);
    });

    // COMMENT
    Route::group(['prefix' => 'comment'], function () {
        Route::get('list/{id}', [CommentController::class,'getList'])->name('commentList');
    });

    // AJAX
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('loaitin/{id}', [AjaxController::class,'getLoaiTin'])->name('ajaxgetloaitin');
    });

});