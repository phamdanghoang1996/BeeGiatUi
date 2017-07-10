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
</style>
  <div id="wrapper">
      <!-- Navigation -->
      @include('layouts.theme.navmenu')

      <div id="page-wrapper">
        <div class="container" class="form-group" style="width: 90%; margin-left: 15%;">
            <h3>Cập nhật giá Giặt, Ủi: </h3>
            <form class="" action="{{route('postCapnhat')}}" method="post">
              <h4>Giá cũ: <span>Đơn vị tính: đồng/kg</span></h4>
                <p>Tiền giặt: <span>{{number_format($tiengiat)}} đồng</span></p>
                <p>Tiền sấy: <span>{{number_format($tiensay)}} đồng</span></p>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <label for="">Giá giặt: </label>
                  <input type="text" name="new_giagiat" value="" class="form-control" id="sokg" style="width: 70%;" required="required" placeholder="Đồng/kg">
              <label for="">Giá sấy: </label>
                  <input type="text" name="new_giasay" value="" class="form-control" id="sokg" style="width: 70%;" required="required" placeholder="Đồng/kg">
              <div class="text-center">
                  <button type="submit" name="button" class="btn-success">Cập nhật giá</button>
              </div>
            </form>
        </div>
      </div>

  </div>
  <!-- /#wrapper -->

  @include('layouts.lib_js_home')
</body>

</html>
