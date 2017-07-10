<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html">Cửa hàng giặt ủi: BEE</a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <li>
                    <a class="text-center" href="#">
                        <strong>Read All Messages</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-messages -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> Thông tin tài khoản</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Cài đặt</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{url('login')}}"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li>
                    <a id="home" href="{{url('admin/home')}}"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Thống kê<span class="fa arrow"></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="">Thống kê chung</a>
                        </li>
                        <li>
                            <a href="{{url('admin/thongke/thongkegiatui')}}">Thống kê tiền giặt và ủi</a>
                        </li>
                        <li>
                            <a href="{{url('admin/thongke/thongkedoanhso')}}">Thống kê doanh sô</a>
                        </li>
                        <li>
                            <a href="{{url('admin/thongke/thongkekhachhang')}}">Thống kê 10 khách hàng  </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="tables.html"><i class="fa fa-table fa-fw"></i> Lịch sử giặt ủi</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-group"></i> Quản lý khách hàng <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Thêm tài khoản khách hàng</a>
                        </li>
                        <li>
                            <a href="#">Tài khoản khách hàng</a>
                        </li>
                    </ul>
                <li>
                    <a href="#"><i class="fa fa-universal-access"></i> Quản lý nhân viên <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                          <a href="#">Thêm tài khoản nhân viên</a>
                        </li>
                        <li>
                            <a href="#">Tài khoản nhân viên</a>
                        </li>
                        <li>
                            <a href="#">Nhân viên <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Tiền lương</a>
                                </li>
                                <li>
                                    <a href="#">Nợ công nhân viên</a>
                                </li>
                                <li>
                                    <a href="#">Số ngày nghỉ</a>
                                </li>
                                <li>
                                    <a href="#">Tiền thưởng</a>
                                </li>
                            </ul>

                        </li>
                    </ul>

                </li>
                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> Cài đặt<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('admin/caidat/capnhatgia')}}">Cập nhật giá giặt, sấy</a>
                        </li>
                        <li>
                            <a href="{{url('admin/caidat/chuongtrinhkhuyenmai')}}">Chương trình khuyến mãi</a>
                        </li>
                        <li>
                            <a href="{{url('admin/caidat/khoiphuctaikhoan')}}">Khôi phục tài khoản nhân viên</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
