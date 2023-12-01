<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $order;
    public function __construct() {
        $this->order = new Order();
    }
    public function index()
    {
        // $list = $this->order->orderes();
        $key = request()->key;
        $list = Order::search($key)->get();
        return view('bills_manager.order', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $maxDonID = DB::table('orders')->max(DB::raw('CAST(SUBSTRING(DonID, 3, 3) AS SIGNED)'));
        $newDonID = 'DH' . str_pad($maxDonID + 1, 3, '0', STR_PAD_LEFT);
        $list = DB::table('customers')->select('KHID', 'TenKH')->get();
        return view('bills_manager.createorder', compact('list','newDonID'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::create([
            'DonID' => $request->input('id'),
            'customer_id' => $request->input('customer_id'),
            'SoKhach' => $request->input('sk'),
            'TrangThai' => 1
            // 'TrangThai' => $request->input('tt')
        ]);
        $order->save();
        return redirect()->route('orders');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show($id)
    {
        $ghidh = DB::table('ghidhs')
        ->join('dishes','ghidhs.dish_id','=','dishes.MonID')
        ->select('order_id', 'dishes.TenMon', 'Soluong', 'dish_id')
        ->where('order_id', $id)
        ->get();
        // dd($ghidh);
        return view('bills_manager.showghidh', compact('ghidh'));
    }
    public function edit($id)
    {
        $order = DB::table('orders')->select('DonID', 'SoKhach', 'customer_id', 'TrangThai')->where('DonID', $id)->first();
        return view('bills_manager.editorder', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = DB::table('orders')->where('DonID', $id)
            ->update([
                'DonID' => $request->input('id'),
                'customer_id' => $request->input('customer_id'),
                'SoKhach' => $request->input('sk'),
                'TrangThai' => $request->input('tt')
            ]);
        return redirect()->route('orders');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = DB::table('orders')->where('DonID', $id);
        $order->delete();
        return redirect()->route('orders');
    }

    public function edit_ct( $dish_id, $order_id)
    {
        $ghidh = DB::table('ghidhs')->select('order_id', 'dish_id')
        ->where('dish_id', $dish_id)
        ->where('order_id', $order_id)
        ->select('order_id', 'dish_id','SoLuong')
        ->first();
        return view('sales_manager.editchitiet', compact('ghidh'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_ct(Request $request, $dish_id, $order_id)
    {
        $ghidh = DB::table('ghidhs')
            ->where('dish_id', $dish_id)
            ->where('order_id', $order_id)
            ->update([
                'order_id' => $request->input('order_id'),
                'dish_id' => $request->input('dish_id'),
                'SoLuong' => $request->input('sl'),
            ]);
        return redirect()->route('sales');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_ct($dish_id, $order_id)
    {
        $ghidh = DB::table('ghidhs')
            ->where('dish_id', $dish_id)
            ->where('order_id', $order_id);
        $ghidh->delete();
        return redirect()->route('sales');
    }
}
