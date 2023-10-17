<?php

namespace App\Http\Controllers;

use App\Models\Foodgr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodgrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $foodgr;
    public function __construct(){
        $this->foodgr = new Foodgr();
    }
    public function index()
    {
        $key = request()->key;
        $list = Foodgr::search($key)->get();
        // $list = $this->foodgr->foodgrs();
        return view('restaurant_manager.foodgr',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('restaurant_manager.createfoodgr');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $foodgr = Foodgr::create([
            'NhomID' => $request->input('id'),
            'TenNhom' => $request->input('name'),
        ]);
        $foodgr->save();
        return redirect()->route('foodgrs');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $foodgr = DB::table('foodgrs')->select('NhomID', 'TenNhom')->where('NhomID', $id)->first();
        return view('restaurant_manager.editfoodgr', compact('foodgr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $foodgr = DB::table('foodgrs')->where('NhomID', $id)
            ->update([
                'NhomID' => request()->input('id'),
                'TenNhom' => request()->input('name')
            ]);
        return redirect()->route('foodgrs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $foodgr = DB::table('foodgrs')->where('NhomID', $id);
        $foodgr->delete();
        return redirect()->route('foodgrs');
    }
}
