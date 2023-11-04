@extends('layouts.app')
@section('title')
    <title>Đơn hàng</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Đơn hàng</h4>
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
                    <div class="float-right d-inline-flex pr-2">
                        <li class="pr-1"><a href="{{ route('orders') }}">Danh sách</a></li>
                        <a href="#">/</a>
                        <li class="pl-1"><a href="{{ route('orders.create') }}">Thêm</a></li>
                    </div>
                    <div class="row pt-5 pl-4 d-flex">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <table class="table table-bordered text-center table-hover table-info">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Mã khách hàng</th>
                                        <th>Số khách</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Chi tiết</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $order)
                                        <tr>
                                            <td>{{ $order->DonID }}</td>
                                            <td>{{ $order->customer_id }}</td>
                                            <td>{{ $order->SoKhach }}</td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->TrangThai }}</td>
                                            <td><a href="{{ route('orders.show', ['DonID' => $order->DonID]) }}"><i class="fa-solid fa-circle-info"></i></a></td>
                                            <td>
                                            {{-- <td><a href="{{ route('orders.edit', ['DonID' => $order->DonID]) }}"><i
                                                        class="fa-solid fa-pen-to-square"></i></a></td>
                                            <td> --}}
                                                <form action="{{ route('orders.edit', ['DonID' => $order->DonID]) }}" method="post">
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
