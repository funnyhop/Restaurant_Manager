@extends('layouts.app')
@section('title')
    <title>Thêm khách hàng</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Thêm khách hàng</h4>
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
                        <li class="pr-1"><a href="{{ route('customers') }}">Danh sách</a></li>
                        <a href="#">/</a>
                        <li class="pl-1"><a href="#">Thêm</a></li>
                    </div>
                    <div class="row pt-3 pl-4 d-flex pb-4">
                        <div class="col-3"></div>
                        <div class="col-7">
                            <form action="{{ route('customers.store') }}" method="post">
                                @csrf
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Mã khách hàng:</label>
                                    <input type="text" class="input-form pl-2" name="id" id="exampleInput1"
                                        placeholder="KH001">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Tên khách hàng:</label>
                                    <input type="text" class="input-form pl-2" name="name" id="exampleInput1"
                                        placeholder="Nguyễn Hải Đăng">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Giới tính</label>
                                    <input type="text" class="input-form pl-2" name="gt" id="exampleInput2"
                                        placeholder="Nam">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Số điện thoại</label>
                                    <input type="text" class="input-form pl-2" name="phone" id="exampleInput2"
                                        placeholder="09837748377">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Địa chỉ</label>
                                    <input type="text" class="input-form pl-2" name="address" id="exampleInput2"
                                        placeholder="An Bình, Cái Răng, Cần Thơ, Việt Nam">
                                </div>
                                <div class="float-right pr-1 pt-2">
                                    <button type="reset" class="btn btn-secondary">Hủy</button>
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
