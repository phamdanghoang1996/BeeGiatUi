<?php

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
Route::get('login','pagecontroller@getLogin');
Route::post('login','pagecontroller@postLogin')->name('postLogin');
Route::group(['prefix'=>'admin'], function(){
  //HOME:
  Route::get('home','pagecontroller@getHome')->name('home');
  Route::post('home','pagecontroller@postHome')->name('postHome');
  Route::get('home/ajaxkhachhang/id','pagecontroller@ajaxKhachhang');
  //THONG KE:
  Route::get('thongke','pagecontroller@getThongke');
  Route::group(['prefix'=>'thongke'], function(){
    //Thong ke giat ui:
    Route::get('thongkegiatui','pagecontroller@getThongkegiatui')->name('thongkegiatui');
    Route::post('thongkegiatui','pagecontroller@postThongkegiatui')->name('postGiatUi');
    Route::get('thongkesoluot','pagecontroller@getThongkesoluot');
    Route::get('thongkedoanhso','pagecontroller@getThongkedoanhso');
    Route::get('thongkekhachhang','pagecontroller@getThongkekhachhang');
  });
  //LICH SU GIAT:
  Route::get('lichsugiat','pagecontroller@getLichsu');
  //QUAN LY KHACH HANG:
  Route::group(['prefix'=>'quanlykhachhhang'],function(){
    Route::get('themtaikhoankhachhang','pagecontroller@getThemtaikhoankhachhang');
    Route::get('themtaikhoankhachhang/ajaxquan/{id}','pagecontroller@getAjaxQuan');
    Route::get('taikhoankhachhang','pagecontroller@getTaikhoankhachhang');
  });
  //QUAN LY NHAN VIEN:
  Route::group(['prefix'=>'quanlynhanvien'], function(){
    //THONG TIN TAI KHOAN NHAN VIEN:
    Route::get('taikhoannhanvien','pagecontroller@getTaikhoannhvien');
    //ROUTE THEM NHAN VIEN:
    Route::get('themtaikhoannhanvien','pagecontroller@getThemtaikhoannhanvien');
    Route::post('themtaikhoannhanvien','pagecontroller@postThemtaikhoannhanvien')->name('postNhanvien');
    //Tai khoan nhan vien:
    Route::get('taikhoannhanvien','pagecontroller@getTaikhoannhvien');
    Route::get('taikhoannhanvien/kichhoat/{id}','pagecontroller@getKichhoat');
    //NHAN VIEN:
    Route::group(['prefix'=>'nhanvien'],function(){
      Route::get('tienluong','pagecontroller@getTienluong');
      Route::get('nocongnhanvien','pagecontroller@getNocong');
      Route::get('ngaynghi','pagecontroller@getNgaynghi');
      Route::get('tienthong','pagecontroller@getTienthuong');
    });
  });
  //CAI DAT:
  Route::group(['prefix'=>'caidat'], function(){
      Route::get('capnhatgia','pagecontroller@getCapnhat')->name('capnhatgia');
      Route::post('capnhatgia','pagecontroller@postCapnhat')->name('postCapnhat');
      Route::get('chuongtrinhkhuyenmai','pagecontroller@getChuongtrinh');
      Route::get('khoiphuctaikhoan','pagecontroller@getKhoiphuc');
  });

});
Route::get('testchart','pagecontroller@testchart');
