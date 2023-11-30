@extends('layouts.app')
@section('title')
    <title>Bán hàng</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Bán hàng</h4>
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
                    <div class="col-11 pt-1 pl-5 mx-auto">
                        <div class="row pt-1">
                            <div class="col-4 pl-2 pr-2">
                                <b>Thêm đơn hàng:</b>
                            </div>
                        </div>
                        {{-- <div class="col-4">
                            <form action="{{ route('sales.store') }}" method="post">
                                @csrf
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Mã khách hàng:</label>
                                    <input type="text" class="input-form pl-2" name="khid" id="exampleInput1"
                                        placeholder="KH001">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1" class="pr-2">Tên khách hàng:</label>
                                    <input type="text" class="input-form pl-2" name="name" id="exampleInput1"
                                        placeholder="Nguyễn Hải Đăng">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Giới tính</label>
                                    <input type="text" class="input-form pl-2" name="gt" id="exampleInput2"
                                        placeholder="Nam">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Số điện thoại</label>
                                    <input type="text" class="input-form pl-2" name="phone" id="exampleInput2"
                                        placeholder="09837748377">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput2" class="pr-2">Địa chỉ</label>
                                    <input type="text" class="input-form pl-2" name="address" id="exampleInput2"
                                        placeholder="An Bình, Cái Răng, Cần Thơ, Việt Nam">
                                </div>
                                <div class="float-right pr-1 pt-2">
                                    <button type="reset" class="btn btn-secondary">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </form>
                        </div> --}}
                        <div class="row d-flex pl-2 pr-2">
                            <form action="{{ route('sales.store') }}" method="post">
                                @csrf
                                <div class="d-flex">
                                    <div class="input-group pr-3 pb-2">
                                        <label for="exampleInput1" class="pr-2">Mã đơn hàng:</label>
                                        <input type="text" class="input-form pl-2" name="dhid" id="exampleInput1"
                                        value="{{ $newDonID }}"    placeholder="DH001">
                                    </div>
                                    <div class="input-group pr-3 pb-2">
                                        <label for="exampleInput1" class="pr-2">Khách hàng:</label>
                                        <select class="input-select pl-2" name="customer_id" id="exampleInput1">
                                            <option selected disabled>Chọn khách hàng</option>
                                            @foreach ($list_customer as $customer)
                                                <option value="{{ $customer->KHID }}">{{ $customer->TenKH }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group pr-3 pb-2">
                                        <label for="exampleInput2" class="pr-2">Lượng khách:</label>
                                        <input type="text" class="input-form pl-2" name="sk" id="exampleInput2"
                                            placeholder="12">
                                    </div>
                                    <div class="input-group pr-3 pb-2">
                                        <label for="exampleInput2" class="pr-2">Trạng thái:</label>
                                        <input type="text" class="input-form pl-2" name="tt" id="exampleInput2"
                                            placeholder="0: Hủy| 1:Chưa thanh toán">
                                    </div>

                                </div>
                                <div class="float-right pr-3 pt-2">
                                    <button type="reset" class="btn btn-secondary">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </form>
                        </div>
                        <div class="row pt-1">
                            <div class="col-4 pl-2 pr-2">
                                <b>Ghi đơn hàng:</b>
                            </div>
                        </div>
                        <div class="row d-flex pl-2 pr-2">
                            <form action="{{ route('sales.store') }}" class="pb-1" method="post">
                                @csrf
                                <div class="d-flex">
                                    <div class="input-group pr-3 pb-2">
                                        <label for="exampleInput1">Mã đơn hàng:</label>
                                        {{-- <input type="text" class="input-form" id="exampleInput1" placeholder="HD001"> --}}
                                        <select class="input-select pl-2" name="order_id" id="mat">
                                            <option selected disabled value="{{ $newghiDonID }}">{{ $newghiDonID }}</option>
                                            @foreach ($list_order as $order)
                                                <option value="{{ $order->DonID }}">{{ $order->DonID }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group pr-3 pb-2">
                                        <label for="mat">Món ăn:</label>
                                        <select class="input-select pl-2" name="dish_id" id="mat">
                                            <option selected disabled>Chọn món</option>
                                            @foreach ($list_dish as $dish)
                                                <option value="{{ $dish->MonID }}">{{ $dish->TenMon }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group pr-3 pb-2">
                                        <label for="exampleInput1">Số lượng:</label>
                                        <input type="text" class="input-form" name="sl" id="exampleInput1"
                                            placeholder="1">
                                    </div>
                                    <div class="pt-1 mt-4 pb-1 pr-3 float-right ">
                                        <button type="submit" class="btn btn-primary">Ghi</button>
                                    </div>
                                </div>
                            </form>
                            {{-- <form action="{{ route('sales.store') }}" method="post">
                                <div class="pb-1"><b>Thêm hóa đơn:</b></div>
                                @csrf
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1">Mã hóa đơn:</label>
                                    <input type="text" class="input-form" name="hdid" id="exampleInput1" placeholder="T0001">
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1">Đơn hàng:</label>
                                    <select class="input-select pl-2" name="order_id" id="mat">
                                        <option selected disabled>Chọn đơn</option>
                                        @foreach ($list_order as $order)
                                            <option value="{{ $order->DonID }}">{{ $order->DonID }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group d-flex pb-2">
                                    <label for="exampleInput1">Nhân viên:</label>
                                    <select class="input-select pl-2" name="staff_id" id="mat">
                                        <option selected disabled>Chọn NV</option>
                                        @foreach ($list_staff as $staff)
                                            <option value="{{ $staff->NVID }}">{{ $staff->TenNV }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="float-right pt-2 pb-5">
                                    <button type="reset" class="btn btn-secondary">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </article>
    <!-- /.content-wrapper -->
@endsection
