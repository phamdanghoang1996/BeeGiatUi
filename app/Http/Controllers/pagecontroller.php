<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Validator;
use App\khachhang;
use App\giat;
use App\cthd;
use App\nhanvien;
use App\luong;
use App\taikhoan;
use Carbon\Carbon;

class pagecontroller extends Controller
{
  //LOGIN
    public function getLogin(){
      return view('login.login');
    }
    //HOME
      public function getHome(){
        $tien = DB::table('capnhattien')->get();
        foreach ($tien as $item) {
          $tiengiat=$item->tiengiat;
          $tiensay=$item->tiensay;
        }
        $diachi = DB::table('district')->get();
        return
        view('adminpage.home.home',['diachi'=>$diachi,'tiengiat'=>$tiengiat,'tiensay'=>$tiensay]);
      }
      public function ajaxKhachhang(){

      }
      public function postHome(Request $request){
        //Thêm khách hàng:
        /*$khachhang = new khachhang();
        $khachhang->id_khachhang = "1";
        $khachhang->tenkh = $request->tenkh;
        $khachhang->sodt = $request->sodt;
        $khachhang->id_tp = $request->thanhpho;
        $khachhang->id_quan = $request->quan;
        $khachhang->id_phuong = $request->phuong;
        $khachhang->save();  */
        //Them bang Giat:
        $giat = new giat();
            //Khoa chinh:
                $id_giat = DB::table('giat')->max('id_giat');
                $id_giat = $id_giat + 1;
            $giat->id_giat = $id_giat;
            //So kg giat:
            $giat->sokg = $request->sokg;
            //Tien giat, tien say:
            $giat->tiengiat = $request->tiengiat;
            $giat->tiensay = $request->tiensay;
            $giat->thanhtien = $request->thanhtien;
            //Giat luc:
                $time = Carbon::now();
            $giat->giatluc = $time;
            $giat->save();
            return redirect()->route('home');

      }
  //THONG KE:
        public function getThongke(){

        }
        //Thong ke giat ui:
        public function getThongkegiatui(){
          //Tien giat:
            $tiengiat = DB::table('giat')->sum('tiengiat');
          //Tien say:
            $tiensay = DB::table('giat')->sum('tiensay');
            return view('adminpage.thongke.thongkegiatui',['tiengiat'=>$tiengiat,'tiensay'=>$tiensay]);
        }
        public function postThongkegiatui(Request $req){
            if(isset($req->bd1_tungay)){
              $tiengiat = DB::table('giat')->where('giatluc','>=',$req->bd1_tungay)->
              where('giatluc','<=',$req->bd1_denngay)->sum('tiengiat');
              $tiensay =  DB::table('giat')->where('giatluc','>=',$req->bd1_tungay)->
              where('giatluc','<=',$req->bd1_denngay)->sum('tiensay');
              return view('adminpage.thongke.thongkegiatui',['tiengiat'=>$tiengiat,'tiensay'=>$tiensay]);
            }
            if(isset($red->bd2_tungay)){

            }
        }
        public function getThongkesoluot(){
            return view('adminpage.thongke.chart.soluotTheothoigian');
        }
        public function getThongkedoanhso(){
            return view('adminpage.thongke.chart.thongkedoanhso');
        }
        public function getThongkekhachhang(){
            return view('adminpage.thongke.chart.thongkekhachhang');
        }
    //KHÁCH HÀNG:
        public function getThemtaikhoankhachhang(){
          $diachi = DB::table('district')->get();
          return view('adminpage.khachhang.themkhachhang',['diachi'=>$diachi]);
        }
        public function getAjaxQuan($id){
        $phuong = DB::table('ward')->where('districtid','=',$id)->get();
        return view('adminpage.home.ajaxphuong',['quan'=>$phuong]);
    }
    // NHAN VIEN:
      //THÊM NHÂN VIÊN:
        public function getThemtaikhoannhanvien(){
          return view('adminpage.nhanvien.themnhanvien');
        }
        public function postThemtaikhoannhanvien(Request $request){
          //Them tai thong tin nhan vien:
          $nhanvien = new nhanvien();
          $nhanvien->tennhanvien = $request->tennv;
          $nhanvien->sinhngay = $request->sinhngay;
          $nhanvien->cmnd = $request->cmnd;
          $nhanvien->noio = $request->noio;
          $nhanvien->save();
          //Them tai khoan nhan vien:
          $taikhoan = new taikhoan();
          $taikhoan->tentaikhoan = $request->tentk;
          $taikhoan->matkhau = $request->matkhau;
              $time = Carbon::now();
          $taikhoan->time =$time;
              $id_nhanvien = DB::table('nhanvien')->max('id_nhanvien');
          $taikhoan->id_nhanvien = $id_nhanvien;
          $taikhoan->save();
          //Bat update vao 2 bang nay:
        return redirect('admin/quanlynhanvien/themtaikhoannhanvien')->with('thongbao', 'Đã thêm thành công nhân viên');
        }
    //CAI DAT:
      //Cập nhật Giá:
        public function getCapnhat(){
          $tiencu = DB::table('capnhattien')->get();
          foreach($tiencu as $item){
            $tiengiat = $item->tiengiat;
            $tiensay = $item->tiensay;
          }
          return view('adminpage.caidat.capnhatgia',['tiengiat'=>$tiensay,'tiensay'=>$tiengiat]);
        }
        public function postCapnhat(Request $request){
            DB::table('capnhattien')->where('id_giat','=',1)->update([
                'tiengiat'=>$request->new_giagiat,
                'tiensay'=>$request->new_giasay
            ]);
            return redirect()->route('capnhatgia');
        }
        public function getChuongtrinh(){
          echo "Chuong trinh khuyen mai";
        }
        public function getKhoiphuc(){
          echo "Day la trang khoi phuc";
        }
    //kiểm tra dữ thống kê:
      public function testchart(){
        return view('chartGiatUi');
      }
}
