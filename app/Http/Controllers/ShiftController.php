<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $shift;
    public function __contruct(){
        $this->shift = new Shift();
    }
    public function index()
    {
        $key = request()->key;
        $list = Shift::search($key)->get();
        return view('HRM.shift', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('HRM.createshift');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $shift = Shift::create([
            'CaID' => $request->input('id'),
            'ShiftStart' => $request->input('start'),
            'ShiftEnd' => $request->input('end'),
            'Luong' => $request->input('salary')
        ]);
        $shift->save();
        return redirect()->route('shifts');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shift = DB::table('shifts')->select('CaID', 'ShiftStart', 'ShiftEnd','Luong')->where('CaID', $id)->first();
        return view('HRM.editshift', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $shift = DB::table('shifts')->where('CaID', $id)
                ->update([
                    'CaID' => $request->input('id'),
                    'ShiftStart' => $request->input('start'),
                    'ShiftEnd' => $request->input('end'),
                    'Luong' => $request->input('salary')
                ]);
                // dd($request,$id);
        return redirect()->route('shifts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shift = DB::table('shifts')->where('CaID', $id);
        $shift->delete();
        return redirect()->route('shifts');
    }
}
