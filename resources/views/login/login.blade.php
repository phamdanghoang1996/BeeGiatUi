
<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.lib_css_login')

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="font-weight:bold;">ĐĂNG NHẬP</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('postLogin')}}" method="post">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tên đăng nhập" name="tendangnhap" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" name="matkhau" type="password" value="">
                                </div>
                                <button type="submit" name="button"class="btn btn-lg btn-success btn-block">Login</button>
                                @if(session('thongbao'))
                                  <div class="alert alert-danger" style="margin-top: 10px;">
                                      <p style="font-weight: bold;">{{session('thongbao')}}</p>
                                  </div>
                                @endif

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.lib_js_login')

</body>

</html>
