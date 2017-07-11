
<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.lib_css_home')
</head>
  <script type="text/javascript">
    function xuly(id){
      var trangthai = id.getAttribute("data-id-type"); //id nay dai dien cho cai this... This tro vao cai hien tai cua no
      var id_taikhoan = id.getAttribute("id");
      var id_bam = "#"+id.getAttribute("id"); //Lay gia tri nam trong the id
      var value_button = id.getAttribute("button");
      if(trangthai==1){
        $(id_bam).attr('class','btn-danger'); //Thay doi ten the ne!!!
        $(id_bam).addClass('btn-danger');
        $(id_bam).html("Kích hoạt");
        id.setAttribute('data-id-type',0);
        var link = "http://localhost/Bee/public/index.php/admin/quanlynhanvien/taikhoannhanvien/kichhoat/"+id_taikhoan+"/"+trangthai;
        $.get(link);
      }
      else {
        $(id_bam).attr('class','btn-success');
        $(id_bam).addClass('btn-success');
        $(id_bam).html("Đang hoạt động");
        id.setAttribute('data-id-type',1);
        var link = "http://localhost/Bee/public/index.php/admin/quanlynhanvien/taikhoannhanvien/kichhoat/"+id_taikhoan+"/"+trangthai;
        $.get(link);
      }
    }
  </script>
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
          button {
            font-weight: bold;
          }
        </style>
          <div class="container" class="form-group" style="width: 90%; margin-left: 15%;">
              <h3> Thông tin tài khoản </h3>
              <table class="table">
                  <thead>
                      <th>ID</th>
                      <th>Tên nhân viên</th>
                      <th>Tên tài khoản</th>
                      <th>Ngày khởi tạo</th>
                      <th>Chức năng</th>
                  </thead>
                  @foreach($thongtin as $key)
                  <tbody>
                      <td>{{$key->id_taikhoan}}</td>
                      <td>{{$key->tennhanvien}}</td>
                      <td>{{$key->tentaikhoan}}</td>
                      <td>{{$key->time}}</td>
                      <td>
                        <button type="button" name="button" class="btn-info">Xem chi tiết</button>
                        @if($key->trangthai==0)
                        <button type="button" name="button" class="btn-danger" onclick="xuly(this)"
                        id="{{$key->id_taikhoan}}" data-id-type="{{$key->trangthai}}">Kích hoạt</button>
                        @else
                        <button type="button" name="button" class="btn-success" onclick="xuly(this)"
                        id="{{$key->id_taikhoan}}" data-id-type="{{$key->trangthai}}">Đang hoạt động</button>
                        @endif
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
