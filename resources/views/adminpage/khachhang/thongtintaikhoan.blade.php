
<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.lib_css_home')
    <script type="text/javascript" src={{asset('js/jquery.validate.min.js')}}> </script>
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
              <h3> Thông tin tài khoản </h3>
              <table class="table-bordered">
                  <thead class="text-center">
                      <td style="width:10%;">ID</td>
                      <td>Tên khách hàng</td>
                      <td style="width: 12%;">Loại khách hàng</td>
                      <td>Tạo lúc</td>
                      <td>Địa chỉ</td>
                      <td>Số điện thoại</td>
                      <td>Chức năng</td>
                  </thead>
                  @foreach($thongtin as $key)
                  <tbody class="text-center">
                      <td>{{$key->id_khachhang}}</td>
                      <td>{{$key->tenkh}}</td>
                      <td>{{$key->loaikh}}</td>
                      <td>{{$key->taoluc}}</td>
                      <td>{{$key->phuong}}, {{$key->quan}}, {{$key->thanhpho}}</td>
                      <td>{{$key->sodt}}</td>
                      <td>
                        <button type="button" name="button" class="btn-info">Xem chi tiết</button>
                        <button type="button" name="button" class="btn-danger" onclick="xuly(this)"
                        id="" data-id-type="">Xóa</button>
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
