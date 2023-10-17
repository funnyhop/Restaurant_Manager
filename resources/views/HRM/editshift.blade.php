@extends('layouts.app')
@section('title')
    <title>Cập nhật ca làm</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Cập nhật ca làm</h4>
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
                        <li class="pr-1"><a href="{{ route('shifts') }}">Danh sách</a></li>
                        <a href="#">/</a>
                        <li class="pl-1"><a href="{{ route('shifts.create') }}">Thêm</a></li>
                    </div>
                    <div class="row pt-3 pl-4 d-flex">
                        <div class="col-3"></div>
                        <div class="col-7">
                            <form action="{{ route('shifts.update', ['CaID' => $shift->CaID]) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Mã ca:</label>
                                    <input type="text" class="input-form pl-2" name="id" id="exampleInput1"
                                        value="{{ $shift->CaID }}" placeholder="M0001">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Giờ bắt đầu:</label>
                                    <input type="text" class="input-form pl-2" name="start" id="exampleInput1"
                                        value="{{ $shift->ShiftStart }}" placeholder="20:22:22">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Giờ kết thúc:</label>
                                    <input type="text" class="input-form pl-2" name="end" id="exampleInput2"
                                        value="{{ $shift->ShiftEnd }}" placeholder="24:22:22">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Lương:</label>
                                    <input type="text" class="input-form pl-2" name="salary" id="exampleInput2"
                                        value="{{ $shift->Luong }}" placeholder="70000.00">
                                </div>
                                <div class="float-right pr-1 pt-2">
                                    <a href="{{ route('shifts') }}" class="btn btn-secondary">Hủy</a>
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
