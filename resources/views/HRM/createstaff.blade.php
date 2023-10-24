@extends('layouts.app')
@section('title')
    <title>Thêm nhân viên</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Thêm nhân viên</h4>
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
                            <form action="{{ route('staffs.store') }}" method="post">
                                @csrf
                                <div class="row pb-4">
                                    <div class="col-6">
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput1" class="pr-2">Mã nhân viên:</label>
                                            <input type="text" class="input-form pl-2" name="id" id="exampleInput1"
                                                placeholder="NV001">
                                        </div>
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput1" class="pr-2">Tên nhân viên:</label>
                                            <input type="text" class="input-form pl-2" name="name" id="exampleInput1"
                                                placeholder="Nguyễn Hải Đăng">
                                        </div>
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput1" class="pr-2">Ngày sinh:</label>
                                            <input type="text" class="input-form pl-2" name="ns" id="exampleInput1"
                                                placeholder="2023-01-01">
                                        </div>
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput2" class="pr-2">Giới tính:</label>
                                            <input type="text" class="input-form pl-2" name="gt" id="exampleInput2"
                                                placeholder="Nam">
                                        </div>
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput2" class="pr-2">Số điện thoại:</label>
                                            <input type="text" class="input-form pl-2" name="phone" id="exampleInput2"
                                                placeholder="09837748377">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput2" class="pr-2">Email:</label>
                                            <input type="text" class="input-form pl-2" name="email" id="exampleInput2"
                                                placeholder="email">
                                        </div>
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput2" class="pr-2">Password:</label>
                                            <input type="text" class="input-form pl-2" name="password" id="exampleInput2"
                                                placeholder="12345678">
                                        </div>
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput2" class="pr-2">Địa chỉ:</label>
                                            <input type="text" class="input-form pl-2" name="address" id="exampleInput2"
                                                placeholder="An Bình, Cái Răng, Cần Thơ, Việt Nam">
                                        </div>
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput2" class="pr-2">Chức vụ:</label>
                                            <input type="text" class="input-form pl-2" name="cv" id="exampleInput2"
                                                placeholder="Nhân viên">
                                        </div>
                                        <div class="input-group d-flex pb-2">
                                            <label for="exampleInput2" class="pr-2">Role</label>
                                            <input type="text" class="input-form pl-2" name="role_id" id="exampleInput2"
                                                placeholder="1|2|3">
                                        </div>
                                        <div class="float-right pt-2 mt-1">
                                            <button type="reset" class="btn btn-secondary">Hủy</button>
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
