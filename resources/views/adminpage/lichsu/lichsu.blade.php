
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lịch sử giặt</title>
    @include('layouts.lib_css_home')
</head>

<body>
  <div id="wrapper">

      <!-- Navigation -->
      @include('layouts.theme.navmenu')
      <div id="page-wrapper">
        <style media="screen">
          label{
            margin-top: 20px;
            font-weight: bold;
            font-size: 18px;
          }
          h3{
            font-weight: bold;
            margin-top: 20px;
          }
          .table-bordered{
            width: 100%;
            margin-top: 1%;
          }
          button {
            font-weight: bold;
          }
          td{
            padding: 1%;
          }
          thead{
            font-weight: bold;
            background-color: #DFF0D8;
          }
        </style>
          <div class="container" class="form-group" style="width: 100%;">
              <h3> Lịch sử giặt:  </h3>
              <div id="chucnang">
                    <button type="button" name="button" class="btn-success"><span class="glyphicon glyphicon-save-file"></span>Xuất lịch sử</button>
                    <select id="sapxep" class="btn-info">
                      <option value="id_tang">Tăng dần theo ID </option>
                      <option value="id_giam">Giảm dần theo ID </option>
                      <option value="tien_tang">Tăng dần theo thành tiền</option>
                      <option value="tien_giam">Giảm dần theo thành tiền</option>
                      <option value="trangthai">Trạng thái</option>
                    </select>
              </div>
              <table class="table-bordered">
                  <thead class="text-center">
                      <td style="width:5%;">ID</td>
                      <td>Giặt lúc</td>
                      <td>Số KG</td>
                      <td>Tiền giặt</td>
                      <td>Tiền sấy</td>
                      <td>Thành tiền</td>
                      <td>Trạng thái</td>
                      <td>Chức năng</td>
                  </thead>

                  @foreach($thongtin as $key)
                  <tbody class="text-center">
                      <td>{{$key->id_giat}}</td>
                      <td>{{$key->giatluc}}</td>
                      <td>{{$key->sokg}}</td>
                      <td>{{number_format($key->tiengiat)}} đồng</td>
                      <td>{{number_format($key->tiensay)}} đồng</td>
                      <td>{{number_format($key->thanhtien)}} đồng</td>
                      @if($key->trangthai=="Chưa thanh toán")
                      <td style="color: red; font-weight: bold;">{{$key->trangthai}}</td>
                      @else
                      <td style="color: #6ABC90; font-weight: bold;">{{$key->trangthai}}</td>
                      @endif
                      <td><button type="button" name="button" class="btn-danger">Xem chi tiết</button></td>
                  </tbody>
                  @endforeach
              </table>


            </div>

      </div>



  </div>
  <!-- /#wrapper -->
  @include('layouts.lib_js_home')
</body>
</html>
