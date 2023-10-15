<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap css 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <main>
        <header>
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <a href="/sales" class="brand-link">
                        <img src="{{ asset('images/logo-nha-hang.png') }}" alt="logo"
                            class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="font-weight-light" style="font-family: scandia-web">Nhà hàng Oganic</span>
                    </a>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <!-- Sidebar user panel (optional) -->
                        <div class="d-flex" data-toggle="dropdown">
                            <a href="#">Đăng nhập</a>
                            <i class="fa-solid fa-user pl-3 pr-2"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item dropdown-header">Thông tin cá nhân</a>
                            <a href="#" class="dropdown-item dropdown-header">Đăng xuất</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        <article>
            Content
        </article>
        <aside>
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="#salescollapse" class="nav-link" data-toggle="collapse">
                                <i class="fa-solid fa-cart-shopping i-sidebar"></i>
                                <p>Bán hàng<span class="right badge badge-danger">Sales</span></p>
                            </a>
                            <div class="pl-4">
                                <a href="sales" class="nav-link nav-dopdown collapse" id="salescollapse">
                                    <p>Bán thuốc</p>
                                </a>
                                <a href="#" class="nav-link nav-dopdown collapse"
                                    id="salescollapse">
                                    <p>Toa thuốc</p>
                                </a>
                                <a href="customers" class="nav-link nav-dopdown collapse" id="salescollapse">
                                    <p>Khách hàng</p>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#collapse1" class="nav-link" data-toggle="collapse">
                                <i class="fa-solid fa-pills i-sidebar"></i>
                                <p>Thuốc<span class="right badge badge-tealgr">Medicine</span></p>
                            </a>
                            <div class="pl-4">
                                <a href="producers" class="nav-link nav-dopdown collapse" id="collapse1">
                                    <p>Nhà sản xuất</p>
                                </a>
                                <a href="suppliers" class="nav-link nav-dopdown collapse" id="collapse1">
                                    <p>Nhà cung cấp</p>
                                </a>
                                <a href="druggr" class="nav-link nav-dopdown collapse" id="collapse1">
                                    <p>Thêm nhóm thuốc</p>
                                </a>
                                <a href="medicines" class="nav-link nav-dopdown collapse" id="collapse1">
                                    <p>Thêm thuốc</p>
                                </a>
                                <a href="prices" class="nav-link nav-dopdown collapse" id="collapse1">
                                    <p>Giá thuốc</p>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#collapse2" class="nav-link" data-toggle="collapse">
                                <i class="fa-solid fa-warehouse i-sidebar"></i>
                                <p>Quản lý kho</p>
                            </a>
                            <div class="pl-4">
                                <a href="#" class="nav-link nav-dopdown collapse"
                                    id="collapse2">
                                    <p>Nhập thuốc từ phiếu</p>
                                </a>
                                <a href="#" class="nav-link nav-dopdown collapse"
                                    id="collapse2">
                                    <p>Danh sách phiếu nhập</p>
                                </a>
                                <a href="checkinventory" class="nav-link nav-dopdown collapse" id="collapse2">
                                    <p>Kiểm kho</p>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="staffs" class="nav-link">
                                <i class="fa-solid fa-user-doctor i-sidebar"></i>
                                <p>Nhân viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#collapse4" class="nav-link" data-toggle="collapse">
                                <i class="fa-solid fa-file-invoice i-sidebar"></i>
                                <p>Quản lý hóa đơn</p>
                            </a>
                            <div class="pl-4">
                                <a href="bills" class="nav-link nav-dopdown collapse" id="collapse4">
                                    <p>Hóa đơn bán</p>
                                </a>
                                <a href="revenue" class="nav-link nav-dopdown collapse" id="collapse4">
                                    <p>Doanh thu</p>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </aside>
        <footer class="main-footer">
            <div class="float-right pr-3">
                All rights reserved.
            </div>
            <p>Nhà hàng Oganic <strong>Copyright &copy; 2023-<a href="#">Dinh Thai Hop</a>.</strong></p>
        </footer>
    </main>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

</body>

</html>
