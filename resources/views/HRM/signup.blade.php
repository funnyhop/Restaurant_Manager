@extends('layouts.app')
@section('title')
    <title>Đăng ký ca làm</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Đăng ký ca làm</h4>
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
                        <li class="pr-1"><a href="{{ route('signups') }}">Danh sách</a></li>
                        <a href="#">/</a>
                        <li class="pl-1"><a href="{{ route('signups.create') }}">Thêm</a></li>
                    </div>
                    <div class="row pt-5 pl-4 d-flex">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <table class="table table-bordered text-center table-hover table-info">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nhân viên</th>
                                        <th>Ca làm</th>
                                        <th>Ngày làm</th>
                                        <th>Cập nhật</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $signup)
                                        <tr>
                                            <td>{{ $signup->staff_id }}</td>
                                            <td>{{ $signup->shift_id }}</td>
                                            <td>{{ $signup->day_id }}</td>
                                            <td><a href="{{ route('signups.edit', ['staff_id' => $signup->staff_id, 'day_id' => $signup->day_id, 'shift_id' => $signup->shift_id]) }}"><i
                                                        class="fa-solid fa-pen-to-square"></i></a></td>
                                            <td>
                                                <form action="{{ route('signups.edit', ['staff_id' => $signup->staff_id, 'day_id' => $signup->day_id, 'shift_id' => $signup->shift_id]) }}"
                                                    method="post">
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
