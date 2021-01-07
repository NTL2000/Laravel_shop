<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\authcontroller;
use Illuminate\Support\Facades\Session;

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
Route::get("test",function(){
	$data =App\Models\BillDetail::find(2)->Bill->toArray();
	var_dump($data);
});
Route::get("index",[PageController::class,'getIndex'])->name('trang-chu');
Route::get("product_type/{type}",[PageController::class,'getProduct_Type'])->name('loai-san-pham');
Route::get("product/{id}",[PageController::class,'getProduct'])->name('san-pham');
Route::get("about",[PageController::class,'getAbout'])->name('gioi-thieu');
Route::get("contact",[PageController::class,'getContact'])->name('lien-he');
Route::get("add-to-cart/{id}",[PageController::class,'getAddToCart'])->name('them-gio-hang');
Route::get("del-card/{id}",[PageController::class,'delItemCart'])->name('xoa-gio-hang');
Route::get("check_out",[PageController::class,'getCheckOut'])->name('thanh-toan');
Route::post("recordCheckout",[PageController::class,'record_CO'])->name('ghi-thanh-toan');
Route::get("login",[PageController::class,'getLogin'])->name('dang-nhap');
Route::get("signin",[PageController::class,'getSignin'])->name('dang-ky');
Route::post('record_user',[PageController::class,'record_US'])->name('ghi_taikhoan');
Route::post('login_ht',[PageController::class,'enter_login'])->name('thuc-hien-dang-nhap');
Route::get('logout_ht',[PageController::class,'log_out'])->name('dang-xuat');
Route::get('search',[PageController::class,'search'])->name('tim-kiem');

