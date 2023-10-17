<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $price;
    public function __contruct(){
        $this->price = new Price();
    }
    public function index()
    {
        // $list = DB::table('prices')->select('day_id',
        //     'dish_id', 'Gia')->get();
        $key = request()->key;
        $list = DB::table('prices')
            ->select('day_id', 'dish_id', 'Gia')
            ->where('dish_id', 'LIKE', '%' . $key . '%')
            ->orWhere('day_id', 'LIKE', '%' . $key . '%')
            ->orWhere('Gia', 'LIKE', '%' . $key . '%')
            ->get();
        return view('restaurant_manager.price', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        DB::statement('CALL InsertYearlyDate()');
        $list = DB::table('dishes')->select('MonID', 'TenMon')->get();
        return view('restaurant_manager.createprice', compact('list'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('prices')->insert([
            'dish_id' => $request->input('dish_id'),
            'day_id' => $request->input('day_id'),
            'Gia' => $request->input('price')
        ]);
        // $price = Price::create([
        //     'day_id' => $request->input('day_id'),
        //     'dish_id' => $request->input('dish_id'),
        //     'Gia' => $request->input('price'),
        // ]);
        // $price->save();
        return redirect()->route('prices');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $dish_id, $day_id)
    {
        $price = DB::table('prices')->select('day_id', 'dish_id')
        ->where('dish_id', $dish_id)
        ->where('day_id', $day_id)
        ->select('day_id', 'dish_id','Gia')
        ->first();
        return view('restaurant_manager.editprice', compact('price'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $dish_id, $day_id)
    {
        $price = DB::table('prices')
            ->where('dish_id', $dish_id)
            ->where('day_id', $day_id)
            ->update([
                'day_id' => $request->input('day_id'),
                'dish_id' => $request->input('dish_id'),
                'Gia' => $request->input('price'),
            ]);
        return redirect()->route('prices');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($dish_id, $day_id)
    {
        $price = DB::table('prices')
            ->where('dish_id', $dish_id)
            ->where('day_id', $day_id);
        $price->delete();
        return redirect()->route('prices');
    }
}
