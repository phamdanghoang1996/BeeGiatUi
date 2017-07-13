<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.lib_css_home')
</head>
<body>
<style media="screen">
  h3{
    font-weight: bold;
  }
  button{
    margin-top: 20px;
  }
  p{
    font-weight: bold;
  }
  p span{
    font-style: italic;
  }
  button{
    font-size: 16px;
    font-weight: bold;
    width: 150px;
    height: 40px;
  }
  input{
    width: 70%;
  }

   label.error {
       display: inline-block;
       color:red;
       width: 100%;
   }
</style>
  <div id="wrapper">
      <!-- Navigation -->
      @include('layouts.theme.navmenu')
      <div id="page-wrapper">
        <div class="container" class="form-group" style="width: 70%; margin-left: 15%;">
          @if(session('thongbao_tc'))
            <div class="alert alert-success" style="margin-top: 10px;">
                <p style="font-weight: bold;">{{session('thongbao_tc')}}</p>
            </div>
          @elseif(session('thongbao_tb'))
          <div class="alert alert-danger" style="margin-top: 10px;">
                <p style="font-weight: bold;">{{session('thongbao_tb')}}</p>
          </div>
          @endif

            <h3>Thêm tài khoản nhân viên:  </h3>
            <form class="" action="{{route('postNhanvien')}}" method="post" id="form-add">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id_nhanvien" value="<?php randomString(); ?>">
              <label for="">Tên nhân viên: </label>
              <br>
                <input type="text" name="tennv" value="" class="form-control"
                placeholder="Họ và tên">
             <label for="">Sinh ngày: </label>
                <input type="date" name="sinhngay" value="" class="form-control"
                placeholder="Năm/tháng/ngày">
              <label for="">Nơi ở: </label>
                <input type="text" name="noio" value="" class="form-control"
                placeholder="">
              <label for="">Số chứng minh nhân dân: </label>
                <input type="number" name="cmnd" value="" class="form-control"
                placeholder="Số">
                <label for="">Lương: </label>
                  <input type="number" name="luong" value="" class="form-control">
              <label for="">Tên tài khoản: </label>
                <input type="text" name="tentk" value="" class="form-control"
                placeholder="6-12 ký tự">
              <label for="">Mật khẩu: </label>
                <input type="password" name="matkhau" value="" class="form-control" id="matkhau"
                placeholder="6-12 ký tự">
              <label for="">Nhập lại mật khẩu: </label>
                  <input type="password" name="re_matkhau" value="" class="form-control" id="re_matkhau"
                  placeholder="">
                  <p id="thongbao"></p>
              <div class="text-center">
                  <button type="submit" name="button" class="btn-success">Thêm nhân viên: </button>
              </div>
            </form>
        </div>
      </div>

  </div>
  <!-- /#wrapper -->
  @include('layouts.lib_js_home')
  <script type="text/javascript" src={{asset('js/jquery.validate.min.js')}}> </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#form-add").validate({
          rules: {
            tennv: "required",
            sinhngay: {
              required: true,
              date: true
            },
            noio: "required",
            matkhau: {
              required: true,
              minlength: 6,
              maxlength: 12
            },
            re_matkhau: {
              required: true,
              minlength: 6,
              maxlength: 12,
              equalTo: "#matkhau"
            }
          },
          messages: {
            tennv: "Vui lòng nhập vào trường này",
            sinhngay: {
              required: "Vui lòng nhập vào trường này",
              date: "Nhập định dạng ngày không chính xác",
            },
            noio: "Vui lòng nhập vào trường này",
            matkhau: {
              required: "Vui lòng nhập vào trường này",
              minlength: "Chưa đủ 6 ký tự",
              maxlength: "Quá chiều dài mật khẩu"
            },
            re_matkhau: {
              required: "<p> Vui lòng nhập vào trường này </p>",
              minlength: "Chưa đủ 6 ký tự",
              maxlength: "Quá chiều dài mật khẩu",
              equalTo: "Không trùng mật khẩu"
            }
          }

      });
    });
  </script>
</body>

</html>
<?php
  function randomString(){
    $char = 'qwertyuiopasdfghjklzxcvbnAS2123SSAC1213SAVSDCAA11213ASm1234567890';
    $char_length = strlen($char);
    $return_String = '';
    for ($i = 0; $i<10; $i++){
      $return_String .= $char[rand(0, $char_length-1)]; //rand(min,max)... Sau do no vay a!! ,... Hieu... Tra ve cai phan tu chua trong mang
    }
    echo $return_String;
  }
 ?>
