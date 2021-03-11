<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('home');
});

//TODO phần view khách hàng
Route::get('home','HomeController@getHome');
Route::get('loaisanpham/{id}','HomeController@getLoaisp');
Route::get('loaisanphamlk/{id}','HomeController@getLoaisp_lk');
Route::get('linhkien','HomeController@getLinhKien');
Route::get('sanpham/{id}','HomeController@getSanPham');
Route::post('add-to-cart/{id}','CartController@postAddTocart');
Route::get('gio-hang','CartController@getGiohang');
Route::post('remove-item-cart/{id}','CartController@removeItemCart');
Route::get('thanh-toan','CartController@getThanhtoan');
Route::post('thanh-toan','CartController@postThanhtoan');


//TODO Phần đăng nhập admin

Route::get('logout','UserController@getDangxuat');

//TODO Phần đăng nhập khách hàng
Route::get('dangnhap','HomeController@getDangnhap');
Route::post('dangnhap','HomeController@postDangnhap');
Route::get('dangxuat','HomeController@getDangxuat');
Route::get('taikhoan/{id}','HomeController@getTK');
Route::post('taikhoan/{id}','HomeController@postTK');
Route::post('comment/{id}','CommentController@postCm');
Route::get('dangky','HomeController@getDangKy');
Route::post('dangky','HomeController@postDangKy');

//TODO phần tìm kiếm
Route::get('search','AjaxController@getSearch')->name('search');


//TODO của admin

//TODO của admin-new
Route::group(['prefix'=>'admin', 'middleware'=>'Admin'], function (){
    Route::get('home','AdminController@home');
    Route::get('baocao','AdminController@baocao');


    Route::group(['prefix'=>'theloai'], function (){
        Route::get('danhsach','TheLoaiController@getDanhsach');
        Route::get('them','TheLoaiController@getThem');
        Route::post('them','TheLoaiController@postThem');
        Route::get('sua/{id}','TheLoaiController@getSua');
        Route::post('sua/{id}','TheLoaiController@postSua');
        Route::get('xoa/{id}','TheLoaiController@getXoa');

    });

    Route::group(['prefix'=>'loaisanpham'], function (){
        Route::get('danhsach','LoaiSpController@getDanhsach');
        Route::get('them','LoaiSpController@getThem');
        Route::post('them','LoaiSpController@postThem');
        Route::get('sua/{id}','LoaiSpController@getSua');
        Route::post('sua/{id}','LoaiSpController@postSua');
        Route::get('xoa/{id}','LoaiSpController@getXoa');
    });

    Route::group(['prefix'=>'sanpham'], function (){
        Route::get('danhsach','SanPhamController@getDanhsach');
        Route::get('them','SanPhamController@getThem');
        Route::post('them','SanPhamController@postThem');
        Route::get('sua/{id}','SanPhamController@getSua');
        Route::post('sua/{id}','SanPhamController@postSua');
        Route::get('xoa/{id}','SanPhamController@getXoa');

    });

    Route::group(['prefix'=>'chitiet'], function (){
        Route::get('danhsach','ChiTietController@getDanhsach');
        Route::get('them','ChiTietController@getThem');
        Route::post('them','ChiTietController@postThem');
        Route::get('sua/{id}','ChiTietController@getSua');
        Route::post('sua/{id}','ChiTietController@postSua');
        Route::get('xoa/{id}','ChiTietController@getXoa');
    });


    Route::group(['prefix'=>'slide'], function (){
        Route::get('danhsach','SlideController@getDanhsach');
        Route::get('them','SlideController@getThem');
        Route::post('them','SlideController@postThem');
        Route::get('sua/{id}','SlideController@getSua');
        Route::post('sua/{id}','SlideController@postSua');
        Route::get('xoa/{id}','SlideController@getXoa');

    });

    Route::group(['prefix'=>'user'], function (){
        Route::get('danhsach','UserController@getDanhsach');
        Route::get('them','UserController@getThem');
        Route::post('them','UserController@postThem');
        Route::get('sua/{id}','UserController@getSua');
        Route::post('sua/{id}','UserController@postSua');
        Route::get('xoa/{id}','UserController@getXoa');

    });

    Route::group(['prefix'=>'customer'], function (){
        Route::get('danhsach','OrderController@getDanhsach');
        Route::get('order','OrderController@getOrder');
        Route::get('order/{id}','OrderController@getOrderct');
        Route::get('sua/{id}','OrderController@getSua');
        Route::post('sua/{id}','OrderController@postSua');

    });



    Route::group(['prefix'=>'comment'],function (){
        Route::get('danhsach','CommentController@getDanhsach');
        Route::get('xoa/{id}','CommentController@getXoa');
    });

    Route::group(['prefix'=>'ajax'],function (){
        Route::get('loaisp/{idTheLoai}','AjaxController@getLoaiSp');
    });

});
