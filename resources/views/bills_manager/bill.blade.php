@extends('layouts.app')
@section('title')
    <title>Hóa đơn</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Hóa đơn</h4>
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
                                        <th>Phụ thu <i>(vnđ)</i></th>
                                        <th>Trị giá <i>(vnđ)</i></th>
                                        <th>In</th>
                                        {{-- <th>Sửa</th> --}}
                                        <th>Xóa</th>
                                        {{-- <th>Tên món</th>
                                        <th>DVT</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá <i>(vnđ)</i></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_bill as $bill)
                                        <tr>
                                            <td>{{ $bill->HDID }}</td>
                                            <td>{{ $bill->created_at }}</td>
                                            <td>{{ $bill->order_id }}</td>
                                            <td>{{ $bill->staff_id }}</td>
                                            <td>{{ number_format($bill->PhuThu,2)}}</td>
                                            <td>
                                                {{ number_format($bill->TongTien, 2, '.', ',') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('pay', ['HDID' => $bill->HDID]) }}"><i class="fa-solid fa-print"></i></a>
                                            </td>
                                            {{-- <td>
                                                <a href="{{ route('bills.edit', ['HDID' => $bill->HDID]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                            </td> --}}
                                            <td>
                                                <form action="{{ route('bills.delete', ['HDID' => $bill->HDID]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn-trash">
                                                        <i class="fa-solid fa-trash "></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
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
