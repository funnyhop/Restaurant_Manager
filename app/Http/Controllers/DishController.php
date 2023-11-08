<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DishController extends Controller
{
    /**
     * Display a listing .
     */
    protected $dish;
    public function __construct() {
        $this->dish = new Dish();
    }
    public function index()
    {
        // $list = $this->dish->dishes();
        $key = request()->key;
        $list = Dish::search($key)->get();
        return view('restaurant_manager.dishs', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $maxMonID = DB::table('dishes')->max(DB::raw('CAST(SUBSTRING(MonID, 3, 3) AS SIGNED)'));
        // $newMonID = 'MA' . str_pad($maxMonID + 1, 3, '0', STR_PAD_LEFT);
        $list = DB::table('foodgrs')->select('NhomID', 'TenNhom')->get();
        return view('restaurant_manager.createdish', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dish = Dish::create([
            'MonID' => $request->input('id'),
            'TenMon' => $request->input('name'),
            'DVT' => $request->input('dvt'),
            'foodgr_id' => $request->input('foodgr_id')
        ]);
        $dish->save();
        return redirect()->route('dishes');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dish = DB::table('dishes')->select('MonID', 'TenMon', 'DVT', 'foodgr_id')->where('MonID', $id)->first();
        return view('restaurant_manager.editdish', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dish = DB::table('dishes')->where('MonID', $id)
            ->update([
                'MonID' => $id,
                'TenMon' => $request->input('name'),
                'DVT' => $request->input('dvt'),
                'foodgr_id' => $request->input('foodgr_id')
                //                'updated_at'=>Carbon::now()
            ]);
        return redirect()->route('dishes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dish = DB::table('dishes')->where('MonID', $id);
        $dish->delete();
        return redirect()->route('dishes');
    }
}
