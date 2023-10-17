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
                    <div class="float-right d-inline-flex pr-2">
                        <li class="pr-1"><a href="{{ route('customers') }}">Danh sách</a></li>
                        <a href="#">/</a>
                        <li class="pl-1"><a href="#">Thêm</a></li>
                    </div>
                    <div class="row pt-3 pl-4 d-flex pb-4">
                        <div class="col-3"></div>
                        <div class="col-7">
                            <form action="{{ route('customers.update', ['KHID' => $customer->KHID]) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Mã khách hàng:</label>
                                    <input type="text" class="input-form pl-2" name="id" id="exampleInput1"
                                    value="{{ $customer->KHID }}"    placeholder="KH001">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Tên khách hàng:</label>
                                    <input type="text" class="input-form pl-2" name="name" id="exampleInput1"
                                    value="{{ $customer->TenKH }}"   placeholder="Nguyễn Hải Đăng">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Giới tính</label>
                                    <input type="text" class="input-form pl-2" name="gt" id="exampleInput2"
                                    value="{{ $customer->GT }}"   placeholder="Nam">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Số điện thoại</label>
                                    <input type="text" class="input-form pl-2" name="phone" id="exampleInput2"
                                    value="{{ $customer->SDT }}"   placeholder="09837748377">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Địa chỉ</label>
                                    <input type="text" class="input-form pl-2" name="address" id="exampleInput2"
                                    value="{{ $customer->DiaChi }}"   placeholder="An Bình, Cái Răng, Cần Thơ, Việt Nam">
                                </div>
                                <div class="float-right pr-1 pt-2">
                                    <a href="{{ route('customers') }}" class="btn btn-secondary">Hủy</a>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
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
