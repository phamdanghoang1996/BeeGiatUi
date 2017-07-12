
<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.lib_css_home')
</head>
<style media="screen">
  .panel-heading{
    background-color: red;
  }
  h5{
    font-weight: bold;
  }
  img{
    margin-top: 10%;
  }
  h3{
    font-weight: bold;
  }

  .col-md-6{
    margin-top: 20px;
  }

</style>
<body>
  <div id="wrapper">

      <!-- Navigation -->
      @include('layouts.theme.navmenu')
      <div id="page-wrapper">
        <div class="container" class="form-group" style="width: 80%; margin-left: 10%;">
          <h3>Thống kê chung</h3>
          <div class="row">
            <div class="col-md-6">
              <div class="panel-default">
                  <div class="panel-body" style="background-color: #31B5F2;">
                        <div class="col-md-5">
                            <img src="{{asset('images/thongkechung/price.png')}}" class="img-responsive">
                        </div>
                        <div class="col-md-7">
                          <div class="text-center">
                            <h5 style="font-weight: bold; color: #FFF; font-size: 22px;">DOANH THU</h5>
                          </div>
                          <div class="text-right">
                          <div style="border-bottom: 1px solid #FFFF;">
                            <p style="font-weight: bold; color: #FFFF; font-size: 16px;">Sấy: {{$tiensay}} đồng</p>
                            <p style="font-weight: bold; color: #FFFF; font-size: 16px;">Giặt: {{$tiengiat}} đồng</p>
                          </div>
                            <p style="font-weight: bold; color: #FFFF; font-size: 20px;">{{$doanhthu}} đồng</p>
                          </div>
                        </div>
                  </div>
                  <div class="panel-footer" style="background-color: #2CA3D9;">
                    <a href="" style="font-weight: bold; color: #FFFFFF; font-size: 17px;">Xem chi tiết</a>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="panel-default" style="background-color: #00B858;">
                  <div class="panel-body">
                    <div class="col-md-5">
                      <img src="{{asset('images/thongkechung/khachhang.png')}}" class="img-responsive">
                    </div>
                    <div class="col-md-7">
                      <div class="text-center">
                        <h5 style="font-weight: bold; color: #FFF; font-size: 22px;">TOP </h5>
                      </div>
                      <div class="text-right">
                      @foreach($khachhang as $item)
                      <p style="font-weight: bold; color: #FFFF; font-size: 16px;">Tên: </p>
                        <p style="font-weight: bold; color: #FFFF; font-size: 16px;">{{$item->loaikh}}</p>
                        <p style="font-weight: bold; color: #FFFF; font-size: 16px;">{{number_format($item->thanhtien)}} đồng</p>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="panel-footer" style="background-color: #00A64F;">
                    <a href="" style="font-weight: bold; color: #FFFFFF; font-size: 17px;">Xem chi tiết</a>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="panel-default">
                  <div class="panel-body" style="background-color: #F0A600;">
                    <div class="col-md-5">
                      <img src="{{asset('images/thongkechung/bill.png')}}" class="img-responsive">
                    </div>
                    <div class="col-md-7">
                      <div class="text-center">
                          <h5 style="font-weight: bold; color: #FFF; font-size: 22px;"> HÓA ĐƠN</h5>
                      </div>

                      <div class="text-right">
                      <div style="border-bottom: 1px solid #FFFF;">
                        <p style="font-weight: bold; color: #FFFF; font-size: 16px;">Đã thanh toán: {{$dathanhtoan}} hóa đơn</p>
                        <p style="font-weight: bold; color: #FFFF; font-size: 16px;">Chưa thanh toán: {{$chuathanhtoan}} hóa đơn</p>
                      </div>

                          <p style="font-weight: bold; color: #FFFF; font-size: 20px;"> {{$total}} hóa đơn</p>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer" style="background-color: #D89916;">
                    <a href="" style="font-weight: bold; color: #FFFFFF; font-size: 17px;">Xem chi tiết</a>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="panel-default">
                  <div class="panel-body" style="background-color: #F75C4C;">
                    <div class="col-md-5">
                      <img src="{{asset('images/thongkechung/time.png')}}" class="img-responsive">
                    </div>
                    <div class="col-md-7">
                      <div class="text-center">
                        <h5 style="font-weight: bold; color: #FFF; font-size: 22px;"> THỜI GIAN ĐẶT</h5>
                      </div>

                      <div class="text-right">
                      <div style="border-bottom: 1px solid #FFFF;">
                        <p style="font-weight: bold; color: #FFFF; font-size: 18px;">Đặt nhiều nhất: {{$dathanhtoan}} hóa đơn</p>
                        <p style="font-weight: bold; color: #FFFF; font-size: 18px;">Đặt ít nhất: {{$chuathanhtoan}} hóa đơn</p>
                      </div>

                          <p style="font-weight: bold; color: #FFFF; font-size: 20px;"> {{$total}} hóa đơn</p>
                      </div>
                    </div>
                  </div>
                  <div class="panel-footer" style="background-color: #DD5445;">
                    <a href="" style="font-weight: bold; color: #FFFFFF; font-size: 17px;">Xem chi tiết</a>
                  </div>
              </div>
            </div>

          </div>
        </div>

      </div>
  <!-- /#wrapper -->
</div>
  @include('layouts.lib_js_home')
</body>

</html>
