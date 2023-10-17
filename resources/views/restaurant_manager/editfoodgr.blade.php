@extends('layouts.app')
@section('title')
    <title>Cập nhật nhóm món ăn</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Cập nhật nhóm món ăn</h4>
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
                    {{-- <div class="float-right d-inline-flex pr-2">
                        <li class="pr-1"><a href="{{ route('foodgrs') }}">Danh sách</a></li>
                        <a href="#">/</a>
                        <li class="pl-1"><a href="#">Thêm</a></li>
                    </div> --}}
                    <div class="row pt-3 pl-4 d-flex">
                        <div class="col-3"></div>
                        <div class="col-7">
                            <form action="{{ route('foodgrs.update',['NhomID' => $foodgr->NhomID]) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Mã nhóm món ăn:</label>
                                    <input type="text" class="input-form pl-2" name="id" id="exampleInput1"
                                     value="{{ $foodgr->NhomID }}"   placeholder="C0001">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Tên nhóm món ăn:</label>
                                    <input type="text" class="input-form pl-2" name="name" id="exampleInput1"
                                    value="{{ $foodgr->TenNhom }}"  placeholder="Món chính">
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
