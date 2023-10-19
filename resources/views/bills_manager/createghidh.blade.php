@extends('layouts.app')
@section('title')
    <title>Ghi đơn hàng</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Ghi đơn hàng</h4>
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
                        <li class="pr-1"><a href="{{ route('ghidhs') }}">Danh sách</a></li>
                        <a href="#">/</a>
                        <li class="pl-1"><a href="#">Thêm</a></li>
                    </div>
                    <div class="row pt-3 pl-4 d-flex">
                        <div class="col-3"></div>
                        <div class="col-7">
                            <form action="{{ route('ghidhs.store') }}" method="post">
                                @csrf
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Đơn hàng:</label>
                                    {{-- <input type="text" class="input-form pl-2" name="order_id" id="exampleInput1"
                                        placeholder="M0001"> --}}
                                    <select class="input-select pl-2" name="order_id" id="exampleInput1">
                                        <option selected disabled>Chọn món ăn</option>
                                        @foreach ($list_order as $order)
                                            <option value="{{ $order->DonID }}">{{ $order->DonID }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Món ăn:</label>
                                    {{-- <input type="text" class="input-form pl-2" name="dish_id" id="exampleInput1"
                                        placeholder="2023-01-01"> --}}
                                    <select class="input-select pl-2" name="dish_id" id="exampleInput1">
                                        <option selected disabled>Chọn món ăn</option>
                                        @foreach ($list_dish as $dish)
                                            <option value="{{ $dish->MonID }}">{{ $dish->TenMon }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Số lượng:</label>
                                    <input type="text" class="input-form pl-2" name="sl" id="exampleInput2"
                                        placeholder="2">
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
