@extends('layouts.app')
@section('title')
    <title>Chi tiết đơn hàng</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Chi tiết đơn hàng</h4>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 ">
                            <a href="{{ route('orders') }}" class="float-right pr-2"><i class="fa-solid fa-arrow-left-long fa-xl"></i></a>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row pt-5 pl-4 d-flex">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <table class="table table-bordered text-center table-hover table-info">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên món ăn</th>
                                        <th>Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ghidh as $value)
                                        <tr>
                                            <td>{{ $value->order_id }}</td>
                                            <td>{{ $value->TenMon }}</td>
                                            <td>{{ $value->Soluong }}</td>
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
