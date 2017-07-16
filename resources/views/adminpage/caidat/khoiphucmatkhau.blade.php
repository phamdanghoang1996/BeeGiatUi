
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

            <script type="text/javascript">
                $(document).ready(function(){
                  $('#tennhanvien').change(function(){
                      var val = $(this).val();
                      var link = "http://localhost/Bee/public/index.php/admin/caidat/khoiphuctaikhoan/"+val;
                      $.get(link, function(data){
                        $('#render').html(data);
                      });
                  });
                });
            </script>
              <h3> Khôi phục tài khoản nhân viên:  </h3>
            <div class="container" class="form-group" style="width: 100%; margin-left: 15%;">


                    <label for="">Tên nhân viên: </label>
                    <select class="form-control" name="tennhanvien" style="width: 50%;" id="tennhanvien">
                      @foreach($thongtin as $item)
                        <option value="{{$item->id_nhanvien}}">{{$item->tennhanvien}}</option>
                      @endforeach
                    </select>
                    <div id="render">

                    </div>



            </div>

      </div>



  </div>
  <!-- /#wrapper -->
  @include('layouts.lib_js_home')
</body>
</html>
