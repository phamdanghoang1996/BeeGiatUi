
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
        <div class="container">
              @include('adminpage.thongke.chart.topkhachhang')
        </div>
      </div>

  </div>
  <!-- /#wrapper -->

  @include('layouts.lib_js_home')
</body>

</html>
