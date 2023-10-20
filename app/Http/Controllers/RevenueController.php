<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class RevenueController extends Controller
{
    protected $year;
    protected $month;
    public function index()
    {
        $years = DB::table('days')
            ->select(DB::raw('YEAR(Ngay) as year'))
            ->distinct()
            ->get();

        $months = DB::table('days')
            ->select(DB::raw('MONTH(Ngay) as month'))
            ->distinct()
            ->get();
        $day_revenue = DB::table('bills')
            ->select(DB::raw('SUM(TongTien) as revenue'))
            ->whereRaw('DATE(created_at) = CURDATE()')
            ->first();
        $month_revenue = DB::table('bills')
            ->select(DB::raw('SUM(TongTien) as revenue'))
            ->whereRaw('MONTH(created_at) = MONTH(NOW())')
            ->first();
        $year_revenue = DB::table('bills')
            ->select(DB::raw('SUM(TongTien) as revenue'))
            ->whereRaw('YEAR(created_at) = YEAR(NOW())')
            ->first();

        return view('bills_manager.revenue', compact('year_revenue','months', 'years', 'day_revenue','month_revenue'));
    }
    public function see_revenue(Request $request)
    {
        // dd($request);
        $this->year = $request->input('nam');
        $this->month = $request->input('thang');
        $years = DB::table('days')
            ->select(DB::raw('YEAR(Ngay) as year'))
            ->distinct()
            ->get();

        $months = DB::table('days')
            ->select(DB::raw('MONTH(Ngay) as month'))
            ->distinct()
            ->get();
        $day_revenue = DB::table('bills')
            ->select(DB::raw('SUM(TongTien) as revenue'))
            ->whereRaw('DATE(created_at) = CURDATE()')
            ->first();
        $month_revenue = DB::table('bills')
            ->select(DB::raw('SUM(TongTien) as revenue'))
            ->whereRaw('MONTH(created_at) = ?', [$this->month])
            ->first();

        $year_revenue = DB::table('bills')
            ->select(DB::raw('SUM(TongTien) as revenue'))
            // ->whereRaw('YEAR(created_at) = ?', [$this->year])
            ->whereYear('created_at', '=', [$this->year])
            ->first();

        return view('bills_manager.revenue', compact('months', 'years', 'day_revenue', 'month_revenue', 'year_revenue'));
    }
}
