<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $customer;
    public function __contruct(){
        $this->customer = new Customer();
    }
    public function index()
    {
        $key = request()->key;
        $list = Customer::search($key)->get();
        return view('bills_manager.customer', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bills_manager.createcustomer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = Customer::create([
            'KHID' => $request->input('id'),
            'TenKH' => $request->input('name'),
            'DiaChi' => $request->input('address'),
            'SDT' => $request->input('phone'),
            'GT' => $request->input('gt')

        ]);
        $customer->save();
        return redirect()->route('customers');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = DB::table('customers')->select('KHID', 'TenKH', 'SDT', 'DiaChi', 'GT')->where('KHID', $id)->first();
        return view('bills_manager.editcustomer', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = DB::table('customers')->where('KHID', $id)
        ->update([
            'KHID' => $request->input('id'),
            'TenKH' => $request->input('name'),
            'DiaChi' => $request->input('address'),
            'SDT' => $request->input('phone'),
            'GT' => $request->input('gt')
        ]);
        return redirect()->route('customers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = DB::table('customers')->where('KHID', $id);
        $customer->delete();
        return redirect()->route('customers');
    }
}
