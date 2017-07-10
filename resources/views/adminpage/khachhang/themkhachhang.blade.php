
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
        <script type="text/javascript">
        $(document).ready(function(){
          var is_Check_Giat = $('#giat').is(':checked');
            $('#say').click(function(){
              var if_Check_Say = $('#say').is(':checked');
              if(if_Check_Say==false) {
                  var tienGiat = $('#giat').val();
                  var soKg = $('#sokg').val();
                  var thanhTien = soKg * tienGiat;
                  $("#tongcong").html("<p style='font-weight: bold; font-size: 18px;'>Thành tiền: <span style='font-weight: bold; color: #DD4F43;'>"+thanhTien+" đồng</span></p>");
                  $('#thanhtien').val(thanhTien);
              }
              else {
                  var tienSay = $(this).val();
                  var tienGiat = $('#giat').val();
                  var soKg = $('#sokg').val();
                  var thanhTien = soKg*tienGiat + soKg*tienSay;
                  $("#tongcong").html("<p style='font-weight: bold; font-size: 18px;'>Thành tiền: <span style='font-weight: bold; color: #DD4F43;'>"+thanhTien+" đồng</span></p>");
                  $('#thanhtien').val(thanhTien);
              }
            });
        });
        </script>
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
        </style>
          <div class="container" class="form-group" style="width: 90%; margin-left: 15%;">
              <h3>THÊM TÀI KHOẢN KHÁCH HÀNG: </h3>
            <div class="panel-default">
                <div class="panel-body">
                  <form class="" action="{{route('postHome')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label for="">Họ và tên: </label>
                    <input type="text" name="tenkh" value="" class="form-control" placeholder="Nhập tên khách hàng" style="width: 70%;">
                    <label for="">Thành phố: </label>
                    <select class="form-control" name="thanhpho" style="width: 70%;">
                          <option value="79">Hồ Chí Minh</option>
                    </select>
                    <label for="">Quận: </label>
                    <script type="text/javascript">
                        $(document).ready(function(){
                           $('#quan').change(function(){
                              var id_quan = $(this).val();
                              var link = "http://localhost:8000/bee/public/index.php/admin/quanlykhachhhang/themtaikhoankhachhang/ajaxquan/"+id_quan;
                              $.get(link, function(data){
                                $('#phuong').html(data);
                              });
                           });
                        });
                    </script>
                    <select class="form-control" name="quan" id="quan" style="width: 70%;">
                          @foreach($diachi as $item)
                            <option value="{{$item->districtid}}">Quận {{$item->quan}}</option>
                          @endforeach
                    </select>
                    <label for="">Phường: </label>
                    <select class="form-control" name="phuong" id="phuong" style="width: 70%;">

                    </select>
                    <label for="">Số điện thoại:  </label>
                    <input type="number" name="sodt" value="" class="form-control" placeholder="Số điện thoại khách hàng" style="width: 70%;">
                    <input type="hidden" name="thanhtien" value="" id="thanhtien">

                    <button type="submit" name="button" class="btn-primary" style="width: 200px; height: 50px; font-weight: bold; border-radius: 25px; margin-left: 30%; margin-top: 10px;">
                      THÊM KHÁCH HÀNG</button>

              </form>
            </div>
          </div>

      </div>



  </div>
  <!-- /#wrapper -->

  @include('layouts.lib_js_home')
</body>

</html>
