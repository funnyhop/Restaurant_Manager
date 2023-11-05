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
                            <a href="{{ route('orders') }}" class="float-right pr-2"><i class="fa-solid fa-arrow-left-long fa-xl"></i></a>
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
                                <b>Ghi đơn hàng:</b>
                            </div>
                        </div>
                        <div class="row d-flex pl-2 pr-2">
                            <form action="{{ route('createbill') }}" class="pb-1" method="post">
                                @csrf
                                <div class="d-flex">
                                    <div class="input-group pr-3 pb-2">
                                        <label for="exampleInput1">Mã hóa đơn:</label>
                                        <input type="text" class="input-form" name="hdid" value="{{ $newHDID }}" id="exampleInput1" placeholder="HD001">
                                    </div>
                                    <div class="input-group pr-3 pb-2">
                                        <label for="exampleInput1">Mã đơn hàng:</label>
                                        <input type="text" class="input-form" name="order_id" value="{{ $order->DonID }}" id="exampleInput1" placeholder="DH001">
                                    </div>
                                    <div class="input-group pr-3 pb-2">
                                        <label for="exampleInput1">Nhân viên:</label>
                                        <input type="text" class="input-form" name="staff_id" value="{{ Auth::check() && Auth::user()->NVID ? Auth::user()->NVID : '' }}" id="exampleInput1" placeholder="NV001">
                                    </div>
                                    <div class="input-group pr-3 pb-2">
                                        <label for="exampleInput1">Phụ thu:</label>
                                        <input type="text" class="input-form" name="pt" id="exampleInput1" placeholder="2000.00">
                                    </div>
                                </div>
                                <div class="pt-1 pb-1 pr-3 float-right ">
                                    <a href="{{ route('bill_huy', ['DonID' => $order->DonID]) }}" class="btn btn-secondary">Hủy</a>
                                    <button type="submit" class="btn btn-primary">Tiếp tục</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </article>
    <!-- /.content-wrapper -->
    <script>
        function submitHuyForm() {
            document.getElementById('huyForm').submit();
        }
    </script>
@endsection
