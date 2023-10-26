@extends('layouts.app')
@section('title')
    <title>Doanh thu</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Doanh thu</h4>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <!-- SEARCH FORM -->
                            <a class="float-right mr-2 pr-2" href=""><i class="fa-solid fa-rotate-right fa-xl"></i></a>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <form action="" method="POST">
                        @csrf
                        <div class="row pl-4 align-items-center">
                            <div class="input-group d-flex pb-2 col-2">
                                <label for="mat" class="pr-2">Năm:</label>
                                <select class="input-select pl-2" name="nam" id="mat">
                                    <option selected disabled>Chọn năm</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year->year }}">{{ $year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group d-flex pb-2 col-2">
                                <label for="matd" class="pr-2">Tháng:</label>
                                <select class="input-select pl-2" name="thang" id="matd">
                                    <option selected disabled>Chọn tháng</option>
                                    @foreach ($months as $month)
                                        <option value="{{ $month->month }}">{{ $month->month }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="pt-3 mt-1 pl-1">
                                <button type="submit" class="btn btn-primary">Xem</button>
                            </div>
                        </div>
                    </form>
                    <div class="row ml-3 pl-1 pb-3 pt-1">
                        <div class="card-deck mx-auto">
                            <div class="card">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa-solid fa-circle-dollar-to-slot fa-2xl" style="color: #42b76f"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="card-content">
                                            <h6><i>Tổng doanh thu:</i></h6>
                                            <p style="font-size: 20px"><b>
                                                    @if (!empty($year_revenue) && $year_revenue->revenue != 0)
                                                        {{ number_format($year_revenue->revenue, 2, '.', ',') }}
                                                    @else
                                                        0
                                                    @endif
                                                </b><i> vnđ</i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa-solid fa-sack-dollar fa-2xl" style="color: #43aa8b;"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="card-content">
                                            <h6><i>Doanh thu tháng:</i></h6>
                                            <p style="font-size: 20px"><b>
                                                    @if (!empty($month_revenue) && $month_revenue->revenue != 0)
                                                        {{ number_format($month_revenue->revenue, 2, '.', ',') }}
                                                    @else
                                                        0
                                                    @endif
                                                </b><i> vnđ</i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa-solid fa-hand-holding-dollar fa-2xl" style="color: #eb3b3b;"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="card-content">
                                            <h6><i>Doanh thu hôm nay:</i></h6>
                                            <p style="font-size: 20px"><b>
                                                    @if (!empty($day_revenue) && $day_revenue->revenue != 0)
                                                        {{ number_format($day_revenue->revenue, 2, '.', ',') }}
                                                    @else
                                                        0
                                                    @endif
                                                </b><i> vnđ</i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </article>
    <!-- /.content-wrapper -->
@endsection
