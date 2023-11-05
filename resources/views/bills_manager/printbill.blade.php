@extends('layouts.app')
@section('title')
    <title>Thanh toán</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Thanh toán</h4>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 ">
                            <!-- SEARCH FORM -->
                            <a class="float-right mr-2" href="{{ route('bills') }}"><i
                                    class="fa-solid fa-arrow-left-long fa-xl" style="color:#e0f8f1"></i></i></a>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row pt-1 pl-4 d-flex mb-3 pb-5 ">
                        {{-- <div class="col-1"></div> --}}
                        <div class="col-4 mx-auto" >
                            <form style="background-color: #e0f8f1" action="{{ route('pay.update', ['HDID' => $bill->HDID]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="d-block pt-3 mb-2 text-lg-center">
                                    <b>NHÀ HÀNG ORGANIC</b>
                                    <p class="m-0">CT252-03, CanTho University</p>
                                    <div ><b>Hotline: 0909056789</b></div>
                                </div>
                                <div class="d-block text-lg-center">
                                    <div><b>HOÁ ĐƠN</b></div>
                                    <div >
                                        <p class="m-0">Mã hóa đơn: {{ $bill->HDID }}</p>
                                    </div>
                                    <div >
                                        <p class="m-0">Ngày: {{ $bill->created_at }}
                                        </p>
                                    </div>
                                    <div >
                                        <p class="m-0">Nhân viên:
                                        @foreach ( $staffs as $staff )
                                           {{ ($staff->NVID == $bill->staff_id) ? $staff->TenNV : '' }}
                                        @endforeach</p>
                                    </div>
                                    <div >
                                        <p class="m-0">Khách hàng:
                                        @foreach ($orders as $order)
                                            @foreach ( $customers as $customer )
                                                {{($order->DonID == $bill->order_id && $customer->KHID == $order->customer_id) ? $customer->TenKH :''}}
                                            @endforeach
                                        @endforeach
                                        </p>
                                    </div>
                                    <div >
                                        <p class="m-0">ĐT:
                                        @foreach ($orders as $order)
                                            @foreach ( $customers as $customer )
                                                {{($order->DonID == $bill->order_id && $customer->KHID == $order->customer_id) ? $customer->SDT :''}}
                                            @endforeach
                                        @endforeach
                                        </p>
                                    </div>
                                </div>
                                <div class="pl-2 pr-2">
                                    <table class="table table-bordered text-center table-hover" style="max-width: 500px;">
                                        <thead>
                                            <tr>
                                                <th>Tên món ăn</th>
                                                <th>SL</th>
                                                <th>DVT</th>
                                                <th>Đơn giá</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sum = 0; ?>
                                            @foreach ($gdhs as $gdh)
                                                @foreach ($dishes as $dish)
                                                    <tr>
                                                        @if ($gdh->order_id == $bill->order_id && $gdh->dish_id == $dish->MonID)
                                                            <td>{{$dish->TenMon}}</td>
                                                            <td>{{$gdh->SoLuong}}</td>
                                                            <td>{{$dish->DVT}}</td>
                                                            <td>{{$prices->first()->Gia}}</td>
                                                            <?php

                                                                $thanhtien = $gdh->SoLuong * $prices->first()->Gia;
                                                                $sum += $thanhtien;
                                                            ?>
                                                            <td>
                                                                {{ number_format($thanhtien, 2) }}
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                            <tr>
                                                <td colspan="5" class="text-left">
                                                    <b>Phụ thu:</b>
                                                    <input class="phuthu" name="pt">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left" colspan="5">
                                                    <b>Tổng giá:</b>
                                                    <i>{{ number_format($sum, 2) }}vnđ <p style="font-size: 10px">(chưa có phụ thu)</p></i>
                                                </td>
                                            </tr>
                                            <input type="hidden" name="sum" value="{{ $sum}}">
                                            <input type="hidden" name="tt_order" value="{{ $bill->order_id }}">
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <p class="pl-3"><i style="font-size: 15px;">(*)Cảm ơn quý khách đã sử dụng dịch vụ Nhà hàng
                                            Organic</i></p>
                                </div>
                                <div class="float-right pr-3 mt-2 row">
                                    <button type="submit" class="btn btn-primary">In</button>
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
