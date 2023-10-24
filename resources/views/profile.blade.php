@extends('layouts.app')
@section('title')
    <title>Thông tin cá nhân</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Thông tin cá nhân</h4>
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
                    <div class="row pt-5 pl-4 d-flex">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <table class="table table-bordered text-center table-hover table-info">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Họ và tên</th>
                                        <th>Giới tính</th>
                                        <th>Ngày sinh</th>
                                        <th>SDT</th>
                                        <th>Email</th>
                                        <th>Vai trò</th>
                                        <th>Địa chỉ</th>
                                        <th>Chỉnh sửa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $user->NVID }}</td>
                                        <td>{{ $user->TenNV }}</td>
                                        <td>{{ $user->GT }}</td>
                                        <td>{{ $user->NgaySinh }}</td>
                                        <td>{{ $user->SDT }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role_id }}</td>
                                        <td>{{ $user->DiaChi }}</td>
                                        <td><a href="{{ route('profile.edit', ['NVID' => $user->NVID]) }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></a></td>
                                    </tr>
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
