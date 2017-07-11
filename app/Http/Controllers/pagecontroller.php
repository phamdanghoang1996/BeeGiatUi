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
    public function postLogin(Request $request){
      $taikhoan = DB::table('taikhoan')->where('tentaikhoan','=',$request->tendangnhap)
        ->where('matkhau','=',$request->matkhau)->get();
      $count = DB::table('taikhoan')->where('tentaikhoan','=',$request->tendangnhap)
          ->where('matkhau','=',$request->matkhau)->count();
      if($count==0){
        return redirect('login')->with('thongbao', 'Tài khoản hoặc mật khẩu không đúng');
      }
      else {
        foreach ($taikhoan as $item) {
          if($item->trangthai==1){
            return redirect('admin/home');
          }
          else {
            return redirect('login')->with('thongbao', 'Tài khoản chưa kích hoạt!');
          }
        }
      }

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
        $khachhang = new khachhang();
          //Khoa chinh khach hang:
            $kc_kh = DB::table('khachhang')->max('id_khachhang') + 1;
        $khachhang->id_khachhang = $kc_kh;
        $khachhang->tenkh = $request->tenkh;
        $khachhang->sodt = $request->sodt;
        $khachhang->loaikh = $request->loaikh;
        $khachhang->id_tp = $request->thanhpho;
        $khachhang->id_quan = $request->quan;
        $khachhang->id_phuong = $request->phuong;
        $khachhang->save();
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
          //Them vao bang chi tiet hoa don:
          $cthd = new cthd();
          $cthd->trangthai = $request->trangthai;
          $cthd->id_khachhang = $kc_kh;
          $cthd->id_giat = $id_giat;
          $cthd->save();
            return redirect()->route('home')->with('ThongBao', 'Hãy bắt đầu giặt đi!');
      }
  //THONG KE:
        public function getThongkechung(){
          //Doanh thu:
          $tiengiat = DB::table('giat')->sum('tiengiat');
          $tiensay = DB::table('giat')->sum('tiensay');
          //doan nay chi la tam thoi thoi:
          $doanhthu = DB::table('giat')->sum('thanhtien');
          //Lương dat:
          $dathanhtoan = DB::table('khachhang')->join('cthd','cthd.id_khachhang','khachhang.id_khachhang')
          ->where('trangthai','=','Đã thanh toán')->count();
          $chuathanhtoan = DB::table('khachhang')->join('cthd','cthd.id_khachhang','khachhang.id_khachhang')
          ->where('trangthai','=','Chưa thanh toán')->count();
          //TOp khach hang:
          $khachhang = DB::table('cthd')->join('khachhang','khachhang.id_khachhang','cthd.id_khachhang')->
          join('giat','giat.id_giat','cthd.id_giat')->orderBy('thanhtien','desc')->limit(1)->get();
              return view('adminpage.thongke.thongkechung',
              ['tiengiat'=>number_format($tiengiat),'tiensay'=>
              number_format($tiensay),'doanhthu'=>number_format($doanhthu)
              ,'dathanhtoan'=>$dathanhtoan,'chuathanhtoan'=>$chuathanhtoan,
              'total'=>$dathanhtoan+$chuathanhtoan,'khachhang'=>$khachhang]);
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
    //LỊCH SỬ GIẶT ỦI:
        public function getLichsu(){
          $thongtin = DB::table('giat')->join('cthd','cthd.id_giat','=','giat.id_giat')->get();
          return view('adminpage.lichsu.lichsu',['thongtin'=>$thongtin]);
        }
    // NHAN VIEN:
      //THÊM NHÂN VIÊN:
        public function getThemtaikhoannhanvien(){
          return view('adminpage.nhanvien.themnhanvien');
        }
        public function postThemtaikhoannhanvien(Request $request){
          //Thêm lương:
          $luong = new luong();
          $luong->luong = $request->luong;
          $luong->save();
          $id_luong = DB::table('luong')->max('id_luong');
          //Them tai thong tin nhan vien:
          $nhanvien = new nhanvien();
          $nhanvien->tennhanvien = $request->tennv;
          $nhanvien->sinhngay = $request->sinhngay;
          $nhanvien->cmnd = $request->cmnd;
          $nhanvien->noio = $request->noio;
          $nhanvien->maluong = $id_luong;
          $nhanvien->save();
          //Them tai khoan nhan vien:
          $taikhoan = new taikhoan();
          $taikhoan->tentaikhoan = $request->tentk;
          $taikhoan->matkhau = $request->matkhau;
              $time = Carbon::now();
          $taikhoan->time =$time;
              $id_nhanvien = DB::table('nhanvien')->max('id_nhanvien');
          $taikhoan->id_nhanvien = $id_nhanvien;
          $taikhoan->trangthai = "0";
          $taikhoan->save();
          //Bat update vao 2 bang nay:
        return redirect('admin/quanlynhanvien/themtaikhoannhanvien')->with('thongbao', 'Đã thêm thành công nhân viên');
        }
      //TAI KHOAN NHAN VIEN:
        public function getTaikhoannhvien(){
          $thongtin = DB::table('nhanvien')->join('taikhoan','nhanvien.id_nhanvien','=','taikhoan.id_nhanvien')->get();
          return view('adminpage.nhanvien.taikhoannhanvien',['thongtin'=>$thongtin]);
        }
        public function getKichhoat($id_taikhoan,$trangthai){
            if($trangthai==1){
              DB::table('taikhoan')->where('id_taikhoan', $id_taikhoan)->update([
                'trangthai'=>'0'
              ]);
            }
            else {
              DB::table('taikhoan')->where('id_taikhoan', $id_taikhoan)->update([
                'trangthai'=>'1'
              ]);
            }
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
            return redirect()->route('capnhatgia')->with('ThongBao', 'Đã cập nhật thành công giá!');
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
