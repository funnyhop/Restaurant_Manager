@extends('layouts.app')
@section('title')
    <title>Cập nhật chi tiết đơn hàng</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Cập nhật chi tiết đơn hàng</h4>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 ">
                            <a href="{{ route('orders') }}" class="float-right pr-2"><i class="fa-solid fa-arrow-left-long fa-xl"></i></a>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row pt-5 pl-4 d-flex">
                        <div class="col-3"></div>
                        <div class="col-8" style="padding-right: 180px">
                            <form action="{{ route('chitiet.update', ['dish_id' => $ghidh->dish_id, 'order_id' => $ghidh->order_id]) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Đơn hàng:</label>
                                    <input type="text" class="input-form pl-2" name="order_id" id="exampleInput1"
                                      value="{{ $ghidh->order_id }}"  placeholder="DH001">

                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Món ăn:</label>
                                    <input type="text" class="input-form pl-2" name="dish_id" id="exampleInput1"
                                    value="{{ $ghidh->dish_id }}"      placeholder="GC001">

                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Số lượng:</label>
                                    <input type="text" class="input-form pl-2" name="sl" id="exampleInput2"
                                    value="{{ $ghidh->SoLuong }}"    placeholder="2">
                                </div>
                                <div class="float-right pr-1 pt-2">
                                    <a href="{{ route('orders') }}" class="btn btn-secondary">Hủy</a>
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


