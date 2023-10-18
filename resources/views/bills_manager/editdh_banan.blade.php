@extends('layouts.app')
@section('title')
    <title>Cập nhật đơn hàng của bàn</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Cập nhật đơn hàng của bàn</h4>
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
                        <li class="pr-1"><a href="{{ route('dh_banans') }}">Danh sách</a></li>
                        <a href="#">/</a>
                        <li class="pl-1"><a href="{{ route('dh_banans.create') }}">Thêm</a></li>
                    </div>
                    <div class="row pt-3 pl-4 d-flex">
                        <div class="col-3"></div>
                        <div class="col-7">
                            <form
                                action="{{ route('dh_banans.update', ['order_id' => $dh_banan->order_id, 'dinnertb_id' => $dh_banan->dinnertb_id]) }}"
                                method="post">
                                @csrf
                                @method('put')
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Đơn hàng:</label>
                                    <input type="text" class="input-form pl-2" name="order_id" id="exampleInput1"
                                        value="{{ $dh_banan->order_id }}" placeholder="DH001">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Bàn ăn:</label>
                                    <input type="text" class="input-form pl-2" name="dinnertb_id" id="exampleInput1"
                                        value="{{ $dh_banan->dinnertb_id }}" placeholder="BT001">
                                </div>
                                <div class="float-right pr-1 pt-2">
                                    <a href="{{ route('dh_banans') }}" class="btn btn-secondary">Hủy</a>
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
