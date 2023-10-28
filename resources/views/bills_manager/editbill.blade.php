@extends('layouts.app')
@section('title')
    <title>Chỉnh sửa hóa đơn</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Chỉnh sửa hóa đơn</h4>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="float-right d-inline-flex pr-2">
                        <li class="pr-1"><a href="{{ route('bills') }}">Danh sách</a></li>
                        <a href="#">/</a>
                        <li class="pl-1"><a href="{{ route('sales') }}">Thêm</a></li>
                    </div>
                    <div class="row pt-3 pl-4 d-flex">
                        <div class="col-3"></div>
                        <div class="col-7">
                            <form action="{{ route('bills.update',['HDID' => $bill->HDID]) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput1" class="pr-2">Mã hóa đơn:</label>
                                            <input type="text" class="input-form pl-2" name="HDID" id="exampleInput1"
                                             value="{{ $bill->HDID }}"   placeholder="HD001">
                                        </div>
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput1" class="pr-2">Ngày lập:</label>
                                            <input type="text" class="input-form pl-2" name="created_at" id="exampleInput1"
                                            value="{{ $bill->created_at }}"  placeholder="2023-12-01 12:22:59">
                                        </div>
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput1" class="pr-2">Mã đơn hàng:</label>
                                            <input type="text" class="input-form pl-2" name="order_id" id="exampleInput1"
                                            value="{{ $bill->order_id }}"  placeholder="DH001">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput1" class="pr-2">Phụ thu:</label>
                                            <input type="text" class="input-form pl-2" name="PhuThu" id="exampleInput1"
                                            value="{{ $bill->PhuThu }}"  placeholder="12000.00">
                                        </div>
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput1" class="pr-2">Mã nhân viên:</label>
                                            <input type="text" class="input-form pl-2" name="staff_id" id="exampleInput1"
                                            value="{{ $bill->staff_id }}"  placeholder="NV001">
                                        </div>
                                        <div class="float-right pr-1 pt-4 mt-2">
                                            <a href="{{ route('bills') }}" class="btn btn-secondary">Hủy</a>
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </article>
    <!-- /.content-wrapper -->
@endsection
