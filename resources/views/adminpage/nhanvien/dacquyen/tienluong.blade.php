
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
              <h3> Tiền lương nhân viên:  </h3>
              <div id="chucnang">
                    <button type="button" name="button" class="btn-success"><span class="glyphicon glyphicon-save-file"></span>Xuất thông tin</button>
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
                      <td style="width:10%;">ID</td>
                      <td> Tên nhân viên</td>
                      <td> Sinh ngày</td>
                      <td> Số CMND</td>
                      <td> Nơi ở</td>
                      <td> Lương</td>
                      <td>Chức năng</td>
                  </thead>

                  @foreach($thongtin as $item)
                  <tbody class="text-center">
                    <td> {{$item->id_nhanvien}}</td>
                    <td> {{$item->tennhanvien}}</td>
                    <td>{{$item->sinhngay}}</td>
                    <td> {{$item->cmnd}}</td>
                    <td> {{$item->noio}}</td>
                    <td> {{number_format($item->luong)}} đồng</td>
                    <td>
                        <button type="button" name="button" class="btn-danger">Thanh toán</button>
                        <button type="button" name="button" class="btn-info">Chi tiết</button>
                    </td>

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
