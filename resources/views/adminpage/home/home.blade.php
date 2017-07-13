
<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.lib_css_home')
</head>

<body>
  <div id="wrapper">

      <!-- Navigation -->
      @include('layouts.theme.navmenu')
      <div id="page-wrapper">
        <script type="text/javascript">
        $(document).ready(function(){
            $('#sokg').keyup(function(){
              var if_Check_Say = $('#say').is(':checked');
              if(if_Check_Say==false) {
                  var tienGiat = $('#giat').val();
                  var soKg = $('#sokg').val();
                  var thanhTien = soKg * tienGiat;
                  var html_tienGiat =    "<p style='font-weight: bold; font-size: 18px;'>Tiền sấy: <span style='font-weight: bold; color: #DD4F43;'>"+soKg*tienGiat+" đồng</span></p>";
                  var html_thanhTien =  "<p style='font-weight: bold; font-size: 18px;'>Thành tiền: <span style='font-weight: bold; color: #DD4F43;'>"+thanhTien+" đồng</span></p>";
                  $("#tongcong").html(html_tienGiat+html_thanhTien);
                  $('#thanhtien').val(thanhTien);
                  $('#tiengiat').val(thanhTien);
              }
              else if(if_Check_Say==true) {
                  var tienSay = $("#say").val();
                  var tienGiat = $('#giat').val();
                  var soKg = $('#sokg').val();
                  var thanhTien = soKg*tienGiat + soKg*tienSay;
                  var html_tienGiat =   "<p style='font-weight: bold; font-size: 18px;'>Thành tiền: <span style='font-weight: bold; color: #DD4F43;'>"+soKg*tienGiat+" đồng</span></p>";
                  var html_tienSay =    "<p style='font-weight: bold; font-size: 18px;'>Tiền sấy: <span style='font-weight: bold; color: #DD4F43;'>"+soKg*tienSay+" đồng</span></p>";
                  var html_thanhTien =  "<p style='font-weight: bold; font-size: 18px;'>Thành tiền: <span style='font-weight: bold; color: #DD4F43;'>"+thanhTien+" đồng</span></p>";
                  $("#tongcong").html(html_tienGiat + html_tienSay + html_thanhTien);
                  $('#thanhtien').val(thanhTien);
                  $('#tiengiat').val(soKg*tienGiat);
                  $('#tiensay2').val(soKg*tienSay);
              }
            });

            $('#khachvanglai').click(function(){
              $('#click').hide();

            });

            $('#khachchinh').click(function(){
                var link = "http://localhost/Bee/public/index.php/admin/home/ajaxkhachchinh/khachchinh";
                $.get(link, function(data){
                  $('#html_khachchinh').html(data);
                });

            });

        });
        </script>
        <style media="screen">
          label{
            margin-top: 20px;
            font-weight: bold;
            font-size: 18px;
          }
          h3{
            font-weight: bold;
          }
          p{
            font-weight: bold;
            font-size: 16px;
            margin-left: 10%;
          }
        </style>
          <div class="container" class="form-group" style="width: 70%; margin-left: 15%;">
            @if(session('ThongBao'))
              <div class="alert alert-success" style="margin-top: 10px;">
                  <p style="font-weight: bold; font-size: 16px;">{{session('ThongBao')}}</p>
              </div>
            @endif
              <h3> Tiền trình giặt: </h3>
                  <form class="" action="{{route('postHome')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label for="">Hình thức làm: </label>
                    <div class="form-group" style="border-bottom: 1px solid; width: 70%">
                          <p> Giặt:
                            <input type="checkbox" name="giat" value="{{$tiengiat}}" id="giat" style="width: 30px; height: 20px;" checked>
                          </p>
                          <p> Sấy :
                            <input type="checkbox" name="say" value="{{$tiensay}}" id="say" style="width: 30px; height: 20px; ">
                          </p>
                    </div>
                    <label for="">Số KG: </label>
                    <input type="text" name="sokg" value="" class="form-control" id="sokg" style="width: 70%;">
                    <div id="tongcong">

                    </div>
                    <label for="">Trạng thái: </label>
                    <p>
                        Chưa thanh toán: <input type="radio" name="trangthai" value="Chưa thanh toán" checked >
                    </p>
                  <p>
                       Đã thanh toán: <input type="radio" name="trangthai" value="Đã thanh toán">
                  </p>
                    <label for="">Loại khách hàng: </label>
                    <script type="text/javascript">

                    </script>

                    <div class="form-group">
                          	<p>Khách vãng lai:
                            <input type="radio" name="loaikh" value="Khách vãng lai" id="khachvanglai" style="width: 30px; height: 20px;" checked>
                          </p>
                          <p> Khách chính:
                            <input type="radio" name="loaikh" value="Khách chính" id="khachchinh" style="width: 30px; height: 20px; ">
                            <div id="html_khachchinh" style="margin-left: 20%;">

                            </div>
                            <div id="thongtin">
                                <input type="hidden" name="tiengiat" value="0" id="tiengiat">
                                <input type="hidden" name="tiensay" value="0" id="tiensay2">
                                <input type="hidden" name="thanhtien" value="0" id = "thanhtien">
                            </div>
                          </p>
                    </div>


                    <button type="submit" name="button" class="btn-primary" style="width: 100px; height: 50px; font-weight: bold; border-radius: 25px; margin-left: 35%;">
                      TIẾN HÀNH</button>
              </form>

            </div>

      </div>



  </div>
  <!-- /#wrapper -->
  @include('layouts.lib_js_home')
</body>
</html>
<?php

 ?>
