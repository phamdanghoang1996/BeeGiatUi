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
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $("#re_matkhau").keyup(function(){
        var re_matkhau = $(this).val();
        var matkhau = $("#matkhau").val();
        if(re_matkhau==matkhau){
          $("#thongbao").html("<p style='font-weight:bold;'> Khớp mật khẩu </p>");
        }
        else {
          $("#thongbao").html("<p style='font-weight:bold;'> Không khớp mật khẩu</p>");
        }
    });
  });
</script>
  <div id="wrapper">
      <!-- Navigation -->
      @include('layouts.theme.navmenu')
      <div id="page-wrapper">
        <div class="container" class="form-group" style="width: 70%; margin-left: 15%;">
          @if(session('thongbao'))
            <div class="alert alert-success" style="margin-top: 10px;">
                <p style="font-weight: bold;">{{session('thongbao')}}</p>
            </div>
          @endif
            <h3>Thêm tài khoản nhân viên:  </h3>
            <form class="" action="{{route('postNhanvien')}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <label for="">Tên nhân viên: </label>
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
              <label for="">Tên tài khoản: </label>
                <input type="text" name="tentk" value="" class="form-control" required="required"
                placeholder="6-12 ký tự">
              <label for="">Mật khẩu: </label>
                <input type="password" name="matkhau" value="" class="form-control" id="matkhau" required="required"
                placeholder="6-12 ký tự">
              <label for="">Nhập lại mật khẩu: </label>
                  <input type="password" name="re_matkhau" value="" class="form-control" id="re_matkhau" required="required"
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
</body>

</html>
