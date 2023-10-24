@extends('layouts.app')
@section('title')
    <title>Cập nhật thông tin cá nhân</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Cập nhật thông tin cá nhân</h4>
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
                    <div class="row pt-2 d-flex pb-5" style="padding-left: 110px;">
                        <div class="col-3"></div>
                        <div class="col-5">
                            <form action="{{ route('profile.update', ['NVID' => $user->NVID]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Mã nhân viên:</label>
                                    <input type="text" class="input-form pl-2" name="id" id="exampleInput1"
                                        value="{{ $user->NVID }}" placeholder="BT001">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Tên nhân viên:</label>
                                    <input type="text" class="input-form pl-2" name="name" value="{{ $user->TenNV }}"
                                        id="exampleInput2" placeholder="Nguyen Van A">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Giới tính:</label>
                                    <input type="text" class="input-form pl-2" name="gt" id="exampleInput2"
                                        value="{{ $user->GT }}" placeholder="Nam">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Ngày sinh:</label>
                                    <input type="text" class="input-form pl-2" name="ns" id="exampleInput2"
                                        value="{{ $user->NgaySinh }}" placeholder="2023-01-01">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Số điện thoại:</label>
                                    <input type="text" class="input-form pl-2" name="phone" id="exampleInput2"
                                        value="{{ $user->SDT }}" placeholder="0912012122">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Email:</label>
                                    <input type="text" class="input-form pl-2" name="email" id="exampleInput2"
                                        value="{{ $user->email }}" placeholder="email@gmail.com">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Password:</label>
                                    <input type="password" class="input-form pl-2" name="password" id="exampleInput2"
                                        value="{{ $user->password }}" placeholder="123">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Địa chỉ:</label>
                                    <input type="text" class="input-form pl-2" name="address" id="exampleInput2"
                                        value="{{ $user->DiaChi }}"
                                        placeholder="63/6 Khu dân cư Hậu Thạnh Mỹ, Lê Bình, Cái Răng-Cần Thơ">
                                </div>
                                <div class="float-right pr-1 pt-2">
                                    <a href="/users" class="btn btn-secondary">Hủy</a>
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
