<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class GhidhController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $ghidh;
    public function __contruct(){
        $this->ghidh = new Ghidh();
    }
    public function index()
    {

        $key = request()->key;
        $list = DB::table('ghidhs')
            ->select('order_id', 'dish_id', 'SoLuong')
            ->where('dish_id', 'LIKE', '%' . $key . '%')
            ->orWhere('order_id', 'LIKE', '%' . $key . '%')
            ->orWhere('SoLuong', 'LIKE', '%' . $key . '%')
            ->get();
        return view('bills_manager.ghidh', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_order = DB::table('orders')->select('DonID')->get();
        $list_dish = DB::table('dishes')->select('MonID', 'TenMon')->get();
        return view('bills_manager.createghidh', compact('list_dish','list_order'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('ghidhs')->insert([
            'dish_id' => $request->input('dish_id'),
            'order_id' => $request->input('order_id'),
            'SoLuong' => $request->input('sl')
        ]);
        // $ghidh = ghidh::create([
        //     'order_id' => $request->input('order_id'),
        //     'dish_id' => $request->input('dish_id'),
        //     'SoLuong' => $request->input('ghidh'),
        // ]);
        // $ghidh->save();
        return redirect()->route('ghidhs');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $dish_id, $order_id)
    {
        $ghidh = DB::table('ghidhs')->select('order_id', 'dish_id')
        ->where('dish_id', $dish_id)
        ->where('order_id', $order_id)
        ->select('order_id', 'dish_id','SoLuong')
        ->first();
        return view('bills_manager.editghidh', compact('ghidh'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $dish_id, $order_id)
    {
        $ghidh = DB::table('ghidhs')
            ->where('dish_id', $dish_id)
            ->where('order_id', $order_id)
            ->update([
                'order_id' => $request->input('order_id'),
                'dish_id' => $request->input('dish_id'),
                'SoLuong' => $request->input('sl'),
            ]);
        return redirect()->route('ghidhs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($dish_id, $order_id)
    {
        $ghidh = DB::table('ghidhs')
            ->where('dish_id', $dish_id)
            ->where('order_id', $order_id);
        $ghidh->delete();
        return redirect()->route('ghidhs');
    }
}
