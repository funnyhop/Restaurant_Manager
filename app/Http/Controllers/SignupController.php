<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Signup;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $signup;
    public function __contruct(){
        $this->signup = new Signup();
    }
    public function index()
    {

        $key = request()->key;
        $list = DB::table('signups')
            ->select('day_id', 'staff_id', 'shift_id')
            ->where('staff_id', 'LIKE', '%' . $key . '%')
            ->orWhere('shift_id', 'LIKE', '%' . $key . '%')
            ->orWhere('day_id', 'LIKE', '%' . $key . '%')
            ->get();
        return view('HRM.signup', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        DB::statement('CALL InsertYearlyDate()');
        $list_nv = DB::table('staffs')->select('NVID', 'TenNV')->get();
        $list_cl = DB::table('shifts')->select('CaID')->get();
        return view('HRM.createsignup', compact('list_nv', 'list_cl'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('signups')->insert([
            'staff_id' => $request->input('staff_id'),
            'day_id' => $request->input('day_id'),
            'shift_id' => $request->input('shift_id')
        ]);
        return redirect()->route('signups');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $staff_id, $day_id, $shift_id)
    {

        $signup = DB::table('signups')
        ->where('staff_id', $staff_id)
        ->where('shift_id', $shift_id)
        ->where('day_id', $day_id)
        ->select('day_id', 'staff_id','shift_id')
        ->first();

        return view('HRM.editsignup', compact('signup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $staff_id, $day_id, $shift_id)
    {
        $signup = DB::table('signups')
            ->where('staff_id', $staff_id)
            ->where('day_id', $day_id)
            ->where('shift_id', $shift_id)
            ->update([
                'day_id' => $request->input('day_id'),
                'staff_id' => $request->input('staff_id'),
                'shift_id' => $request->input('shift_id'),
            ]);
        return redirect()->route('signups');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($staff_id, $day_id, $shift_id)
    {
        $signup = DB::table('signups')
            ->where('staff_id', $staff_id)
            ->where('day_id', $day_id)
            ->where('shift_id', $shift_id);
        $signup->delete();
        return redirect()->route('signups');
    }
}
