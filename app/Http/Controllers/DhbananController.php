<?php

namespace App\Http\Controllers;

use App\Models\DH_BanAn;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DhbananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $dh_banan;
    public function __contruct(){
        $this->dh_banan = new DH_BanAn();
    }
    public function index()
    {
        $key = request()->key;
        $list = DB::table('dh_banans')
            ->select('dinnertb_id', 'order_id')
            ->where('dinnertb_id', 'LIKE', '%' . $key . '%')
            ->orWhere('order_id', 'LIKE', '%' . $key . '%')
            ->get();
        return view('bills_manager.dh_banan', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // DB::statement('CALL InsertYearlyDate()');
        $list_tb = DB::table('dinnertbs')->select('BanID')->get();
        $list_od = DB::table('orders')->select('DonID')->get();
        return view('bills_manager.createdh_banan', compact('list_tb','list_od'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('dh_banans')->insert([
            'order_id' => $request->input('order_id'),
            'dinnertb_id' => $request->input('dinnertb_id'),
        ]);

        return redirect()->route('dh_banans');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $order_id, $dinnertb_id)
    {
        $dh_banan = DB::table('dh_banans')->select('dinnertb_id', 'order_id')
        ->where('order_id', $order_id)
        ->where('dinnertb_id', $dinnertb_id)
        ->select('dinnertb_id', 'order_id')
        ->first();
        return view('bills_manager.editdh_banan', compact('dh_banan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $order_id, $dinnertb_id)
    {
        $dh_banan = DB::table('dh_banans')
            ->where('order_id', $order_id)
            ->where('dinnertb_id', $dinnertb_id)
            ->update([
                'dinnertb_id' => $request->input('dinnertb_id'),
                'order_id' => $request->input('order_id'),
            ]);
        return redirect()->route('dh_banans');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($order_id, $dinnertb_id)
    {
        $dh_banan = DB::table('dh_banans')
            ->where('order_id', $order_id)
            ->where('dinnertb_id', $dinnertb_id);
        $dh_banan->delete();
        return redirect()->route('dh_banans');
    }
}
