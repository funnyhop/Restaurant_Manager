@extends('layouts.app')
@section('title')
    <title>Cập nhật đăng ký</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Cập nhật đăng ký</h4>
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
                            <form
                                action="{{ route('signups.update', ['staff_id' => $signup->staff_id, 'day_id' => $signup->day_id, 'shift_id' => $signup->shift_id]) }}"
                                method="post">
                                @csrf
                                @method('put')
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Mã nhân viên:</label>
                                    {{-- <input type="text" class="input-form pl-2" name="staff_id" id="exampleInput1"
                                        value="{{ $signup->staff_id }}" placeholder="M0001"> --}}
                                    <select class="input-select pl-2" name="staff_id" id="exampleInput1">
                                        <option value="{{ Auth::check() && Auth::user()->NVID ? Auth::user()->TenNV : '' }}">{{ Auth::user()->TenNV }}</option>
                                    </select>
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Mã ca làm:</label>
                                    <input type="text" class="input-form pl-2" name="shift_id" id="exampleInput1"
                                        value="{{ $signup->shift_id }}" placeholder="CS001">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Ngày làm:</label>
                                    <input type="text" class="input-form pl-2" name="day_id" id="exampleInput2"
                                        value="{{ $signup->day_id }}" placeholder="2023-01-01">
                                </div>
                                <div class="float-right pr-1 pt-2">
                                    <a href="{{ route('signups') }}" class="btn btn-secondary">Hủy</a>
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
