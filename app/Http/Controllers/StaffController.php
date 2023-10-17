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
        $staff = Staff::create([
            'NVID' => $request->input('id'),
            'TenNV' => $request->input('name'),
            'NgaySinh' => $request->input('ns'),
            'GT' => $request->input('gt'),
            'SDT' => $request->input('phone'),
            'DiaChi' => $request->input('address'),
            'ChucVu' => $request->input('cv'),
            // 'MatKhau' => $request->input('cv')
        ]);
        $staff->save();
        return redirect()->route('staffs')->with('success','Thêm nhân viên thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = DB::table('staffs')->select('TenNV', 'NVID', 'GT', 'DiaChi', 'SDT', 'NgaySinh', 'MatKhau','ChucVu')->where('NVID', $id)->first();
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
                'ChucVu' => $request->input('cv')
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
}
