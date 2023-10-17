<?php

namespace App\Http\Controllers;

use App\Models\Dinnertb;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DinnertableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $dinnertb;
    public function __construct() {
        $this->dinnertb = new Dinnertb();
    }
    public function index()
    {

        $key = request()->key;
        $list = Dinnertb::search($key)->get();
        return view('restaurant_manager.dinnertb', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('restaurant_manager.createdinnertb');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dinnertb = Dinnertb::create([
            'BanID' => $request->input('id'),
            'SoGhe' => $request->input('number'),
        ]);
        $dinnertb->save();
        return redirect()->route('dinnertbs');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dinnertb = DB::table('dinnertbs')->select('BanID', 'SoGhe')->where('BanID', $id)->first();
        // dd($dinnertb);
        return view('restaurant_manager.editdinnertb', compact('dinnertb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dinnertb = DB::table('dinnertbs')->where('BanID', $id)
            ->update([
                'BanID' => $id,
                'SoGhe' => $request->input('number'),
            ]);
        return redirect()->route('dinnertbs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dinnertb = DB::table('dinnertbs')->where('BanID', $id);
        $dinnertb->delete();
        return redirect()->route('dinnertbs');
    }
}
