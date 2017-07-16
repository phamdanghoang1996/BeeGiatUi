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
  Route::get('home/ajaxkhachchinh/khachchinh','pagecontroller@ajaxKhachchinh');
  //THONG KE:
  Route::get('thongke','pagecontroller@getThongke');
  Route::group(['prefix'=>'thongke'], function(){
    //Thong ke chung:
    Route::get('thongkechung','pagecontroller@getThongkechung');
    //Thong ke giat ui:
    Route::get('thongkegiatui','pagecontroller@getThongkegiatui')->name('thongkegiatui');
    Route::post('thongkegiatui','pagecontroller@postThongkegiatui')->name('postGiatUi');
    //Thong ke so luot:
    Route::get('thongkesoluot','pagecontroller@getThongkesoluot');
    Route::get('thongkedoanhso','pagecontroller@getThongkedoanhso');
    //Thong ke top 10 khach hang:
    Route::get('thongkekhachhang','pagecontroller@getThongkekhachhang');
  });
  //LICH SU GIAT:
  Route::get('lichsugiat','pagecontroller@getLichsu');
  //QUAN LY KHACH HANG:
  Route::group(['prefix'=>'quanlykhachhhang'],function(){
    //them khach hang:
    Route::get('themtaikhoankhachhang','pagecontroller@getThemtaikhoankhachhang');
    Route::post('themtaikhoankhachhang','pagecontroller@postThemtaikhoankhachhang')->name('postKhachhang');
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
    Route::get('taikhoannhanvien/kichhoat/{id_taikhoan}/{trangthai}','pagecontroller@getKichhoat');
    //NHAN VIEN:
    Route::group(['prefix'=>'nhanvien'],function(){
      Route::get('tienluong','pagecontroller@getTienluong');
      Route::get('nocongnhanvien','pagecontroller@getNocong');
      Route::get('ngaynghi','pagecontroller@getNgaynghi');
      Route::get('tienthuong','pagecontroller@getTienthuong');
    });
  });
  //CAI DAT:
  Route::group(['prefix'=>'caidat'], function(){
      Route::get('capnhatgia','pagecontroller@getCapnhat')->name('capnhatgia');
      Route::post('capnhatgia','pagecontroller@postCapnhat')->name('postCapnhat');
      //Chuong trinh khuyn mai:
      Route::get('chuongtrinhkhuyenmai','pagecontroller@getChuongtrinh');
      Route::get('chuongtrinhkhuyenmai/{id_chuongtrinh}/{id}','pagecontroller@ajaxChuongtrinh');
      //Khoi phuc tai khoan nhan vien:
      Route::get('khoiphuctaikhoan','pagecontroller@getKhoiphuc');
      Route::post('khoiphuctaikhoan','pagecontroller@postKhoiphuc')->name('updatePassword');
      Route::get('khoiphuctaikhoan/{id}','pagecontroller@ajaxKhoiphuc');
  });

});
Route::get('testchart','pagecontroller@testchart');
