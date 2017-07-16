<style media="screen">
  button{
    width: 17%;
    height: 40px;
    margin-top: 20px;
  }
  .glyphicon{
    font-size: 20px;
  }
  label.error {
      display: inline-block;
      color: red;
      width: 100%;
  }
</style>
<div class="form-group">
<form action="{{route('updatePassword')}}" method="post" id="form-update">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  @foreach($taikhoan as $item)
  <label for="">Tên tài khoản:  </label>
  <input type="text" name="new_tentk" value="{{$item->tentaikhoan}}" class="form-control" style="width:50%;">
  <input type="hidden" name="id_taikhoan" value="{{$item->id_taikhoan}}">
  @endforeach
  <label for="">Mật khẩu: </label>
  <input type="password" name="new_password" value="" class="form-control" style="width:50%;" id="new_pass">
  <label for="">Mật khẩu: </label>
  <input type="password" name="re_new_password" value="" class="form-control" style="width:50%;" >
  <button type="submit" name="button" class="btn-success"><span class="glyphicon glyphicon-floppy-disk"> </span> CẬP NHẬT MẬT KHẨU</button>
</div>
  </form>
<script type="text/javascript" src={{asset('js/jquery.validate.min.js')}}> </script>
<script type="text/javascript">
$(document).ready(function(){
  $("#form-update").validate({
    rules:{
        new_password: {
          required: true,
          minlength: 6,
          maxlength: 12
        },
        re_new_password: {
          required: true,
          minlength: 6,
          maxlength: 12,
          equalTo: "#new_pass"
        }
      },
      messages: {
        new_password: {
          required: "Bạn phải nhập trường này",
          minlength: "Chiều dài tối thiểu là 6",
          maxlength: "Chiều dài tối đa là 12"
        },
        re_new_password: {
          required: "Bạn phải nhập trường này",
          minlength: "Chiều dài tối thiểu là 6",
          maxlength: "Chiều dài tối đa là 12",
          equalTo: "Không trùng mật khẩu"
        }
      }
  });
});
</script>
