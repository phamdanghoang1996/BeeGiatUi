
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
          .table{
            width: 80%;
          }
          .table tdhover{

          }
        </style>
          <div class="container" class="form-group" style="width: 90%; margin-left: 15%;">
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
              <table class="table">
                  <thead>
                      <th>ID</th>
                      <th>Giặt lúc</th>
                      <th>Số KG</th>
                      <th>Tiền giặt</th>
                      <th>Tiền sấy</th>
                      <th>Thành tiền</th>
                      <th>Trạng thái</th>
                      <th>Chức năng</th>
                  </thead>
                  @foreach($thongtin as $key)
                  <tbody>
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
