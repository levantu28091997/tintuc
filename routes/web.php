<?php

use Illuminate\Support\Facades\Route;
use App\Models\TheLoai;
use App\Http\Controllers\TheloaiController;
use App\Http\Controllers\LoaiTinController;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;

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
        Route::get('list', [TheloaiController::class,'getList']);
        Route::get('add', [TheloaiController::class,'getAdd'])->name('theloaigetAdd');
        Route::post('add', [TheloaiController::class,'postAdd'])->name('theloaipostAdd');
        Route::get('edit', [TheloaiController::class,'getEdit']);
    });

    // LOAI TIN
    Route::group(['prefix' => 'loaitin'], function () {
        Route::get('list', [LoaiTinController::class,'getList']);
        Route::get('add', [LoaiTinController::class,'getAdd']);
        Route::get('edit', [LoaiTinController::class,'getEdit']);
    });

    // TIN TUC
    Route::group(['prefix' => 'tintuc'], function () {
        Route::get('list', [TinTucController::class,'getList']);
        Route::get('add', [TinTucController::class,'getAdd']);
        Route::get('edit', [TinTucController::class,'getEdit']);
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

});