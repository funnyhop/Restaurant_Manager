@extends('layouts.app')
@section('title')
    <title>Cập nhật phân công</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Cập nhật phân công</h4>
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
                        <li class="pr-1"><a href="{{ route('assignments') }}">Danh sách</a></li>
                        <a href="#">/</a>
                        <li class="pl-1"><a href="{{ route('assignments.create') }}">Thêm</a></li>
                    </div>
                    <div class="row pt-3 pl-4 d-flex">
                        <div class="col-3"></div>
                        <div class="col-7">
                            <form
                                action="{{ route('assignments.update', ['staff_id' => $assignment->staff_id, 'day_id' => $assignment->day_id, 'dinnertb_id' => $assignment->dinnertb_id]) }}"
                                method="post">
                                @csrf
                                @method('put')
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Mã nhân viên:</label>
                                    <input type="text" class="input-form pl-2" name="staff_id" id="exampleInput1"
                                        value="{{ $assignment->staff_id }}" placeholder="NV001">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Mã ca làm:</label>
                                    <input type="text" class="input-form pl-2" name="dinnertb_id" id="exampleInput1"
                                        value="{{ $assignment->dinnertb_id }}" placeholder="CS001">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Ngày làm:</label>
                                    <input type="text" class="input-form pl-2" name="day_id" id="exampleInput2"
                                        value="{{ $assignment->day_id }}" placeholder="2023-01-01">
                                </div>
                                <div class="float-right pr-1 pt-2">
                                    <a href="{{ route('assignments') }}" class="btn btn-secondary">Hủy</a>
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
