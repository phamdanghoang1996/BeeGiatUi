
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
      <div class="row">
          <div class="col-md-12">

          </div>
            <div class="col-md-6">
                    <div class="container">
                      <h4 style="font-weight:bold;">Thông kê giặt ủi trong ngày: </h4>
                      <div style="width: 80%" style="margin: auto;">
                            @include('adminpage.thongke.chart.chartGiatUi')
                      </div>
                      <h5 style="margin-left: 40%;"> Đơn vị tính: Đồng</h5>
                      <div class="text-center">
                      <form class="" action="{{route('postGiatUi')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-6">
                          <p>Từ ngày: <input data-format="DD-MM-YYYY" data-template="D MMM YYYY" name="bd1_tungay" type="date" placeholder="năm/tháng/ngày
                            "></p>
                          <p>Đến ngày: <input data-format="DD-MM-YYYY" data-template="D MMM YYYY" name="bd1_denngay" type="date" placeholder="ngày/tháng/năm"></p>
                          <p><button type="submit" name="button">Xem</button> </p>
                          <button type="button" name="button">Xuất chi tiết dạng PDF</button>
                      </form>
                        </div>
                      </div>
                    </div>
            </div>

            <div class="col-md-6">
              <div class="container">
                <h4 style="font-weight:bold;">Thông kê giặt ủi trong ngày: </h4>
                  <div>
                      <div style="width: 50%;">
                        @include('adminpage.thongke.chart.soluotTheothoigian')
                      </div>
                      <h5 style="margin-left: 40%;"> Đơn vị tính: Lượt/giờ</h5>
                          <div class="col-md-6">
                            <div class="text-center">
                              <form class="" action="{{route('postGiatUi')}}" method="post">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <p>Từ ngày: <input data-format="DD-MM-YYYY" data-template="D MMM YYYY" name="bd2_tungay" type="date" placeholder="ngày/tháng/năm"></p>
                                  <p>Đến ngày: <input data-format="DD-MM-YYYY" data-template="D MMM YYYY" name="bd2_denngay" type="date" placeholder="ngày/tháng/năm"></p>
                                      <p><button type="submit" name="button">Xem</button> </p>
                                      <button type="button" name="button">Xuất chi tiết dạng PDF</button>
                              </form>
                            </div>
                          </div>
                </div>
                </div>

            </div>

      </div>

  </div>
  <!-- /#wrapper -->

  @include('layouts.lib_js_home')
</body>

</html>
