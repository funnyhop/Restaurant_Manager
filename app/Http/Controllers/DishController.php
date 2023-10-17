<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

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
        $list = $this->dish->dishes();
        return view('restaurant_manager.dishs', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('restaurant_manager.createdish');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dish = DB::table('dishes')->create([
            'MonID' => $request->input('id'),
            'TenMon' => $request->input('name'),
            'DVT' => $request->input('dvt'),
            'foodgr_id' => $request->input('foodgr_id'),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
