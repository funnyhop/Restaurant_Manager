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
            <nav class="main-header">
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
                            <a href="#" style="color: #f4f6f9e2">Đăng nhập</a>
                            <i class="fa-solid fa-user pl-3 pr-3 pt-1" style="color:aliceblue"></i>
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
            <form action="{{ route('see_revenue') }}" method="POST">
                @csrf
                <div class="row pl-4 align-items-center">
                    <div class="input-group d-flex pb-2 col-2">
                        <label for="mat" class="pr-2">Năm:</label>
                        <select class="input-select pl-2" name="nam" id="mat">
                            <option selected disabled>Chọn năm</option>
                            @foreach ($years as $year)
                                <option value="{{ $year->year }}">{{ $year->year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group d-flex pb-2 col-2">
                        <label for="matd" class="pr-2">Tháng:</label>
                        <select class="input-select pl-2" name="thang" id="matd">
                            <option selected disabled>Chọn tháng</option>
                            @foreach ($months as $month)
                                <option value="{{ $month->month }}">{{ $month->month }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="pt-3 mt-1 pl-1">
                        <button type="submit" class="btn btn-primary">Xem</button>
                    </div>
                </div>
            </form>
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row pl-3 pb-3">
                        <div class="card-deck">
                            <div class="card">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa-solid fa-circle-dollar-to-slot fa-2xl" style="color: #42b76f"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="card-content">
                                            <h6><i>Tổng doanh thu:</i></h6>
                                            <p style="font-size: 20px"><b>
                                                    @if (!empty($year_revenue) && $year_revenue->revenue != 0)
                                                        {{ number_format($year_revenue->revenue, 2, '.', ',') }}
                                                    @else
                                                        0
                                                    @endif
                                                </b><i> vnđ</i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa-solid fa-sack-dollar fa-2xl" style="color: #43aa8b;"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="card-content">
                                            <h6><i>Doanh thu tháng:</i></h6>
                                            <p style="font-size: 20px"><b>
                                                    @if (!empty($month_revenue) && $month_revenue->revenue != 0)
                                                        {{ number_format($month_revenue->revenue, 2, '.', ',') }}
                                                    @else
                                                        0
                                                    @endif
                                                </b><i> vnđ</i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa-solid fa-hand-holding-dollar fa-2xl" style="color: #eb3b3b;"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="card-content">
                                            <h6><i>Doanh thu hôm nay:</i></h6>
                                            <p style="font-size: 20px"><b>
                                                    @if (!empty($day_revenue) && $day_revenue->revenue != 0)
                                                        {{ number_format($day_revenue->revenue, 2, '.', ',') }}
                                                    @else
                                                        0
                                                    @endif
                                                </b><i> vnđ</i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa-solid fa-basket-shopping fa-2xl" style="color: #eb3b3b;"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="card-content">
                                            <h6><i>Chi tiêu tháng này:</i></h6>
                                            <p style="font-size: 20px"><b>
                                                    @if (!empty($month_pay) && $month_pay->pay != 0)
                                                        {{ number_format($month_pay->pay, 2, '.', ',') }}
                                                    @else
                                                        0
                                                    @endif
                                                </b><i> vnđ</i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pl-3 float-right pb-3">
                        <div class="card-deck">
                            <div class="card">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa-solid fa-chart-line fa-2xl" style="color: #fb8500;"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="card-content">
                                            <h6><i>Lợi nhuận tháng:</i></h6>
                                            <p style="font-size: 20px"><b>
                                                    @if (!empty($month_increment) && $month_increment != 0)
                                                        {{ number_format($month_increment, 2, '.', ',') }}
                                                        {{-- thuế 10% = 0.1 --}}
                                                    @else
                                                        0
                                                    @endif
                                                </b><i> vnđ</i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa-solid fa-triangle-exclamation fa-2xl" style="color: #fb8500;"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="card-content">
                                            <h6><i>Cảnh báo thuốc:</i></h6>
                                            <p style="font-size: 18px">
                                                @if (!empty($day_dangerous) && $day_dangerous->dangerous != 0)
                                                    <b>Còn hàng!!!</b>
                                                @else
                                                    <b>Sắp hết hàng!!</b>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!--/ Main content -->
        </article>
        <aside>
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav>
                    <ul class="nav flex-column pt-2" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="#salescollapse" class="nav-link " data-toggle="collapse">
                                <i class="fa-solid fa-cart-shopping "></i>
                                <p>Bán hàng</p><span class="float-right badge badge-danger mr-2">Sales</span>
                            </a>
                            <div class="pl-4">
                                <a href="#" class="nav-link nav-dropdown collapse" id="salescollapse">
                                    <p>Bán thuốc</p>
                                </a>
                                <a href="#" class="nav-link nav-dropdown collapse"
                                    id="salescollapse">
                                    <p>Toa thuốc</p>
                                </a>
                                <a href="#" class="nav-link nav-dropdown collapse" id="salescollapse">
                                    <p>Khách hàng</p>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#collapse1" class="nav-link" data-toggle="collapse">
                                <i class="fa-solid fa-pills "></i>
                                <p>Thuốc</p><span class="float-right badge badge-danger mr-2">Sales</span>
                            </a>
                            <div class="pl-4">
                                <a href="producers" class="nav-link nav-dropdown collapse" id="collapse1">
                                    <p>Nhà sản xuất</p>
                                </a>
                                <a href="suppliers" class="nav-link nav-dropdown collapse" id="collapse1">
                                    <p>Nhà cung cấp</p>
                                </a>
                                <a href="druggr" class="nav-link nav-dropdown collapse" id="collapse1">
                                    <p>Thêm nhóm thuốc</p>
                                </a>
                                <a href="medicines" class="nav-link nav-dropdown collapse" id="collapse1">
                                    <p>Thêm thuốc</p>
                                </a>
                                <a href="prices" class="nav-link nav-dropdown collapse" id="collapse1">
                                    <p>Giá thuốc</p>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#collapse2" class="nav-link" data-toggle="collapse">
                                <i class="fa-solid fa-warehouse "></i>
                                <p>Quản lý kho</p>
                            </a>
                            <div class="pl-4">
                                <a href="#" class="nav-link nav-dropdown collapse"
                                    id="collapse2">
                                    <p>Nhập thuốc từ phiếu</p>
                                </a>
                                <a href="#" class="nav-link nav-dropdown collapse"
                                    id="collapse2">
                                    <p>Danh sách phiếu nhập</p>
                                </a>
                                <a href="checkinventory" class="nav-link nav-dropdown collapse" id="collapse2">
                                    <p>Kiểm kho</p>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="staffs" class="nav-link">
                                <i class="fa-solid fa-user-doctor "></i>
                                <p>Nhân viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#collapse4" class="nav-link" data-toggle="collapse">
                                <i class="fa-solid fa-file-invoice "></i>
                                <p>Quản lý hóa đơn</p>
                            </a>
                            <div class="pl-4">
                                <a href="bills" class="nav-link nav-dropdown collapse" id="collapse4">
                                    <p>Hóa đơn bán</p>
                                </a>
                                <a href="revenue" class="nav-link nav-dropdown collapse" id="collapse4">
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
<tbody>
    <?php $sum = 0; ?>
    @foreach ($ghd as $ghi)
        <tr>
            <td>{{ $ghi->Tenthuoc }}</td>
            <td>{{ $ghi->Soluong }} <i>(viên)</i></td>
            @foreach ($prices as $price)
                @if ($ghi->medicine_id == $price->medicine_id)
                <?php
                    $gia = $ghi->Soluong * $price->Gia;
                    $sum+=$gia;
                ?>
                    <td>{{ number_format($price->Gia, 2) }}</td>
                    <td>{{number_format($gia, 2)}}</td>
                @endif
            @endforeach
        </tr>
    @endforeach
    <td colspan="4"><b>Tổng giá: </b><i>{{ number_format($sum, 2) }}vnđ</i></td>
    <input type="hidden" name="sum" value="{{ $sum }}">
</tbody>
