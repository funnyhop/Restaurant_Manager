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
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="float-right d-inline-flex pr-2">
                        <li class="pr-1"><a href="{{ route('staffs') }}">Danh sách</a></li>
                        <a href="#">/</a>
                        <li class="pl-1"><a href="#">Thêm</a></li>
                    </div>
                    <div class="row pt-3 pl-4 d-flex pb-4">
                        <div class="col-2"></div>
                        <div class="col-9">
                            <form action="{{ route('staffs.update', ['NVID' => $staff->NVID]) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput1" class="pr-2">Mã nhân viên:</label>
                                            <input type="text" class="input-form pl-2" name="id" id="exampleInput1"
                                                value="{{ $staff->NVID }}" placeholder="NV001">
                                        </div>
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput1" class="pr-2">Tên khách hàng:</label>
                                            <input type="text" class="input-form pl-2" name="name" id="exampleInput1"
                                                value="{{ $staff->TenNV }}" placeholder="Nguyễn Hải Đăng">
                                        </div>
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput1" class="pr-2">Ngày sinh:</label>
                                            <input type="text" class="input-form pl-2" name="ns" id="exampleInput1"
                                                value="{{ $staff->NgaySinh }}" placeholder="2023-01-01">
                                        </div>
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput2" class="pr-2">Giới tính</label>
                                            <input type="text" class="input-form pl-2" name="gt" id="exampleInput2"
                                                value="{{ $staff->GT }}" placeholder="Nam">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput2" class="pr-2">Số điện thoại</label>
                                            <input type="text" class="input-form pl-2" name="phone" id="exampleInput2"
                                                value="{{ $staff->SDT }}" placeholder="09837748377">
                                        </div>
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput2" class="pr-2">Địa chỉ</label>
                                            <input type="text" class="input-form pl-2" name="address" id="exampleInput2"
                                                value="{{ $staff->DiaChi }}" placeholder="An Bình, Cái Răng, Cần Thơ, Việt Nam">
                                        </div>
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput2" class="pr-2">Chức vụ</label>
                                            <input type="text" class="input-form pl-2" name="cv" id="exampleInput2"
                                                value="{{ $staff->ChucVu }}" placeholder="Nhân viên">
                                        </div>
                                        {{-- <div class="input-group d-flex pb-2">
                                            <label for="exampleInput2" class="pr-2">Mật khẩu</label>
                                            <input type="text" class="input-form pl-2" name="password" id="exampleInput2"
                                             value="{{ $staff->MatKhau }}"    placeholder="123">
                                        </div> --}}
                                        <div class="float-right pr-1 pt-2 mt-4">
                                            <a href="{{ route('staffs') }}" class="btn btn-secondary">Hủy</a>
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
