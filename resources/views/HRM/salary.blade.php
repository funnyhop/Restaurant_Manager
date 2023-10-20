@extends('layouts.app')
@section('title')
    <title>Lương nhân viên</title>
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
                            <h4 class="ml-3 text-dark" style="font-family: scandia-web">Lương nhân viên</h4>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <!-- SEARCH FORM -->
                            <form class="form-inline ml-3 float-right">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" name="key"
                                        placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit"
                                            style="background-color: #e0f8f1;
                                border-color: silver;">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row pt-4 pb-4 pl-4 ml-5 pl-5 d-flex">
                        {{-- <div class="col-1"></div> --}}
                        <div class="col-10">
                            <table class="table table-bordered text-center table-hover table-info">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Mã nhân viên</th>
                                        <th>Tên nhân viên</th>
                                        <th>Ngày làm</th>
                                        <th>Ca làm</th>
                                        <th>Lương</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assignments as $assignment)
                                        <?php
                                        $rowcount = 0;
                                        $sum = 0;
                                        ?>

                                        @foreach ($salary as $value)
                                            @if ($assignment->staff_id == $value->staff_id && $assignment->day_id == $value->day_id)
                                                <?php $rowcount++; ?>
                                            @endif
                                        @endforeach

                                        <tr>
                                            <td rowspan="{{ $rowcount + 1 }}">{{ $assignment->NVID }}</td>
                                            <td rowspan="{{ $rowcount + 1 }}">{{ $assignment->TenNV }}</td>
                                            <td rowspan="{{ $rowcount + 1 }}">{{ $assignment->day_id }}</td>

                                            @foreach ($salary as $value)
                                                @if ($assignment->staff_id == $value->staff_id && $assignment->day_id == $value->day_id)
                                                    <tr>
                                                        <td>{{ $value->CaID }}</td>
                                                        <td>{{ $value->Luong }}</td>
                                                        <?php
                                                        $sum += $value->Luong;
                                                        ?>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            <tr>
                                                <td><b>Tổng tiền: </b>{{ number_format($sum, 2) }}<i> vnđ</i></td>
                                            </tr>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </article>
    <!-- /.content-wrapper -->
@endsection
