<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $assignment;
    public function __contruct(){
        $this->assignment = new Assignment();
    }
    public function index()
    {

        $key = request()->key;
        $list = DB::table('assignments')
            ->select('day_id', 'staff_id', 'dinnertb_id')
            ->where('staff_id', 'LIKE', '%' . $key . '%')
            ->orWhere('dinnertb_id', 'LIKE', '%' . $key . '%')
            ->orWhere('day_id', 'LIKE', '%' . $key . '%')
            ->get();
        return view('HRM.assignment', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        DB::statement('CALL InsertYearlyDate()');
        $list_nv = DB::table('staffs')->select('NVID', 'TenNV')->get();
        $list_tb = DB::table('dinnertbs')->select('BanID')->get();
        return view('HRM.createassignment', compact('list_nv', 'list_tb'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('assignments')->insert([
            'staff_id' => $request->input('staff_id'),
            'day_id' => $request->input('day_id'),
            'dinnertb_id' => $request->input('dinnertb_id')
        ]);
        return redirect()->route('assignments');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $staff_id, $day_id, $dinnertb_id)
    {

        $assignment = DB::table('assignments')
        ->where('staff_id', $staff_id)
        ->where('assignment_id', $dinnertb_id)
        ->where('day_id', $day_id)
        ->select('day_id', 'staff_id','dinnertb_id')
        ->first();

        return view('HRM.editassignment', compact('assignment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $staff_id, $day_id, $dinnertb_id)
    {
        $assignment = DB::table('assignments')
            ->where('staff_id', $staff_id)
            ->where('day_id', $day_id)
            ->where('dinnertb_id', $dinnertb_id)
            ->update([
                'day_id' => $request->input('day_id'),
                'staff_id' => $request->input('staff_id'),
                'dinnertb_id' => $request->input('dinnertb_id'),
            ]);
        return redirect()->route('assignments');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($staff_id, $day_id, $dinnertb_id)
    {
        $assignment = DB::table('assignments')
            ->where('staff_id', $staff_id)
            ->where('day_id', $day_id)
            ->where('dinnertb_id', $dinnertb_id);
        $assignment->delete();
        return redirect()->route('assignments');
    }
}
