@extends('layouts.app')
@section('title')
    <title>Thêm đăng ký</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Thêm đăng ký</h4>
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
                        <li class="pr-1"><a href="{{ route('signups') }}">Danh sách</a></li>
                        <a href="#">/</a>
                        <li class="pl-1"><a href="{{ route('signups.create') }}">Thêm</a></li>
                    </div>
                    <div class="row pt-3 pl-4 d-flex">
                        <div class="col-3"></div>
                        <div class="col-7">
                            <form action="{{ route('signups.store') }}" method="post">
                                @csrf
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Nhân viên:</label>
                                    <select class="input-select pl-2" name="staff_id" id="exampleInput1">
                                        <option value="{{ Auth::check() && Auth::user()->NVID ? Auth::user()->TenNV : '' }}">{{ Auth::user()->TenNV }}</option>
                                    </select>
                                    {{-- <select class="input-select pl-2" name="staff_id" id="exampleInput1">
                                        <option selected disabled>Chọn nhân viên</option>
                                        @foreach ($list_nv as $staff)
                                            <option value="{{ $staff->NVID }}">{{ $staff->TenNV }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Ca làm:</label>
                                    {{-- <input type="text" class="input-form pl-2" name="day_id" id="exampleInput1"
                                        placeholder="2023-01-01"> --}}
                                    <select class="input-select pl-2" name="shift_id" id="exampleInput1">
                                        <option selected disabled>Chọn ca</option>
                                        @foreach ($list_cl as $shift)
                                            <option value="{{ $shift->CaID }}">{{ $shift->CaID }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Ngày làm:</label>
                                    <input type="text" class="input-form pl-2" name="day_id" id="exampleInput2"
                                        placeholder="2023-01-01">
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
