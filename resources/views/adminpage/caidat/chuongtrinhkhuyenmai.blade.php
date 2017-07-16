
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lịch sử giặt</title>
    @include('layouts.lib_css_home')
</head>
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
  function trangthai(id){
    var trangthai = id.getAttribute("data-id-type");
    var id_chuongtrinh = id.getAttribute('id');
    var id_chuongtrinh_html = "#"+id_chuongtrinh;
    if(trangthai=="Chưa kích hoạt"){
      $(id_chuongtrinh_html).attr('class','btn-success');
      $(id_chuongtrinh_html).html("Đã kích hoạt");
      var link = "http://localhost/Bee/public/index.php/admin/caidat/chuongtrinhkhuyenmai/"+id_chuongtrinh+"/"+"Đã kích hoạt";
      $.get(link);
      id.setAttribute('data-id-type','Đã kích hoạt');
    }
    else {
      $(id_chuongtrinh_html).attr('class','btn-danger');
      $(id_chuongtrinh_html).html("Chưa kích hoạt");
      var link = "http://localhost/Bee/public/index.php/admin/caidat/chuongtrinhkhuyenmai/"+id_chuongtrinh+"/"+"Chưa kích hoạt";
      $.get(link);
      id.setAttribute('data-id-type','Chưa kích hoạt');
    }

  }
</script>
<body>
  <div id="wrapper">

      <!-- Navigation -->
      @include('layouts.theme.navmenu')
      <div id="page-wrapper">
          <h3> Chương trình khuyến mãi: </h3>
          <div class="container" class="form-group" style="width: 90%;">

              <table class="table-bordered">
                  <thead class="text-center">
                      <td style="width:10%;">ID </td>
                      <td>Tên chương trình</td>
                      <td>Chức năng</td>
                  </thead>
                  @foreach($thongtin as $item)
                  <tbody class="text-center">
                      <td>{{$item->mact}}</td>
                      <td>{{$item->tenchuongtrinh}}</td>
                      <td>
                        @if($item->trangthai=="Chưa kích hoạt")
                        <button type="button" name="button" class="btn-danger" id="{{$item->mact}}"
                       data-id-type="{{$item->trangthai}}" onclick="trangthai(this)">
                          {{$item->trangthai}}  </button>
                        @else
                        <button type="button" name="button" class="btn-success" id="{{$item->mact}}"
                       data-id-type="{{$item->trangthai}}" onclick="trangthai(this)">
                          {{$item->trangthai}}  </button>
                        @endif

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
