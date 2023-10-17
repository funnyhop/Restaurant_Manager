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
                        <li class="pr-1"><a href="{{ route('dishes') }}">Danh sách</a></li>
                        <a href="#">/</a>
                        <li class="pl-1"><a href="#">Thêm</a></li>
                    </div>
                    <div class="row pt-3 pl-4 d-flex">
                        <div class="col-3"></div>
                        <div class="col-7">
                            <form action="{{ route('dishes.store') }}" method="post">
                                @csrf
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Mã món ăn:</label>
                                    <input type="text" class="input-form pl-2" name="id" id="exampleInput1"
                                        placeholder="M0001">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Nhóm món ăn:</label>
                                    <input type="text" class="input-form pl-2" name="foodgr_id" id="exampleInput1"
                                        placeholder="MC001">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Tên món ăn:</label>
                                    <input type="text" class="input-form pl-2" name="name" id="exampleInput2"
                                        placeholder="Steak">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Đơn vị tính:</label>
                                    <input type="text" class="input-form pl-2" name="dvt" id="exampleInput2"
                                        placeholder="Đĩa/Phần">
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
