@extends('layouts.app')
@section('title')
    <title>Món ăn</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <article>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Món ăn</h4>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <!-- SEARCH FORM -->
                            <form class="form-inline ml-3 float-right">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" name="key"
                                        placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit"
                                            style="background-color: #e0f8f1;
                                border-color: silver;">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row pt-4 pl-4 d-flex">
                        {{-- <div class="col-1"></div> --}}
                        <div class="col-11 ml-4 pl-4">
                            <table class="table table-bordered text-center table-hover table-info">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Mã hóa đơn</th>
                                        <th>Ngày lập</th>
                                        <th>Đơn hàng</th>
                                        <th>Nhân viên</th>
                                        <th>Phụ thu</th>
                                        <th>Trị giá <i>(vnđ)</i></th>
                                        <th>Thanh toán</th>
                                        <th>Tên món</th>
                                        <th>Số lượng <i>(viên)</i></th>
                                        <th>Đơn giá <i>(vnđ)</i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_bill as $bill)
                                        <?php $rowCount = 0; ?>

                                        @foreach ($list_gdh as $gdh)
                                            @if ($gdh->order_id == $bill->order_id)
                                                <?php $rowCount++; ?>
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td rowspan="{{ $rowCount + 1 }}">{{ $bill->HDID }}</td>
                                            <td rowspan="{{ $rowCount + 1 }}">{{ $bill->created_at }}</td>
                                            <td rowspan="{{ $rowCount + 1 }}">{{ $bill->order_id }}</td>
                                            <td rowspan="{{ $rowCount + 1 }}">{{ $bill->staff_id }}</td>
                                            <td rowspan="{{ $rowCount + 1 }}">{{ $bill->PhuThu }}</td>
                                            <td rowspan="{{ $rowCount + 1 }}">
                                                {{ number_format($bill->TongTien, 2, '.', ',') }}
                                            </td>
                                            <td rowspan="{{ $rowCount + 1 }}">
                                                {{-- <a href="{{ route('pay', ['HDID' => $bill->HDID]) }}"><i class="fa-solid fa-money-bill-1-wave"></i></a> --}}
                                            </td>
                                        </tr>
                                        @foreach ($list_gdh as $gdh)
                                            @if ($gdh->order_id == $bill->order_id)
                                                <tr>
                                                    @foreach ($list_dish as $dish)
                                                        @if ($gdh->dish_id == $dish->MonID)
                                                            <td>{{ $dish->TenMon }}</td>
                                                        @endif
                                                    @endforeach
                                                    <td>{{ $gdh->SoLuong }}</td>
                                                    @foreach ($prices as $price)
                                                        @if ($gdh->dish_id == $price->dish_id)
                                                            <td>{{ number_format($price->Gia, 2) }}</td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </article>
    <!-- /.content-wrapper -->
@endsection
