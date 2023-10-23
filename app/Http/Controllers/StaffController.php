<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $staff;
    public function __contruct(){
        $this->staff = new Staff();
    }
    public function index()
    {
        $key = request()->key;
        $list = Staff::search($key)->get();
        return view('HRM.staff', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('HRM.createstaff');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->input('email'));
        $staff = Staff::create([
            'NVID' => $request->input('id'),
            'TenNV' => $request->input('name'),
            'NgaySinh' => $request->input('ns'),
            'GT' => $request->input('gt'),
            'SDT' => $request->input('phone'),
            'DiaChi' => $request->input('address'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'ChucVu' => $request->input('cv'),
        ]);

        $staff->save();
        return redirect()->route('staffs')->with('success','Thêm nhân viên thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = DB::table('staffs')->select('TenNV', 'NVID', 'GT', 'DiaChi', 'SDT', 'NgaySinh', 'email','password','ChucVu')->where('NVID', $id)->first();
        return view('HRM.editstaff', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $staff = DB::table('staffs')->where('NVID', $id)
            ->update([
                'NVID' => $request->input('id'),
                'TenNV' => $request->input('name'),
                'NgaySinh' => $request->input('ns'),
                'GT' => $request->input('gt'),
                'SDT' => $request->input('phone'),
                'DiaChi' => $request->input('address'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'ChucVu' => $request->input('cv'),
            ]);
        return redirect()->route('staffs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = DB::table('staffs')->where('NVID', $id);
        $staff->delete();
        return redirect()->route('staffs');
    }
    public function staff_salary()
    {
        $key = request()->key;
        $assignments =DB::table('assignments')
            ->join('staffs','assignments.staff_id','=','staffs.NVID')
            ->select('day_id','staff_id', 'NVID', 'TenNV')
            ->where('staff_id', 'LIKE', '%' . $key . '%')
            ->orWhere('day_id', 'LIKE', '%' . $key . '%')
            ->orWhere('TenNV', 'LIKE', '%' . $key . '%')
            ->get();
        $salary = DB::table('staffs')
            ->join('signups', 'staffs.NVID','=','signups.staff_id')
            ->join('shifts', 'signups.shift_id','=','shifts.CaID')
            ->select( 'CaID', 'Luong', 'signups.staff_id', 'signups.day_id')
            ->get();
        // dd($assignments ,$salary);
        return view('HRM.salary', compact('salary','assignments'));
    }

}
