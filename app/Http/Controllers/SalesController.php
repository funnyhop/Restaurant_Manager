<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Dish;
use App\Models\GhiDH;
use App\Models\Order;
use App\Models\Staff;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    protected $order, $customer, $dish, $staff, $bill;
    public function __contruct(){
        $this->order = new Order();
        $this->customer = new Customer();
        $this->dish = new Dish();
        $this->staff = new Staff();
        $this->bill = new Bill();
    }
    public function index() {
        DB::statement('CALL InsertYearlyDate()');
        // $list_order = $this->order->orders();
        // $list_customer = $this->customer->customers();
        // $list_dish = $this->dish->dishes();
        // $list_staff = $this->staff->staffs();
        $list_order = DB::table('orders')->select('DonID')->get();
        $list_customer = DB::table('customers')->select('KHID', 'TenKH')->get();
        $list_dish = DB::table('dishes')->select('MonID', 'TenMon')->get();
        $list_staff = DB::table('staffs')->select('NVID', 'TenNV')->get();
        return view('sales_manager.index', compact('list_order', 'list_customer', 'list_dish', 'list_staff'));
    }

    public function createcus(Request $request){
        $customer = Customer::create([
            'KHID' => $request->input('khid'),
            'TenKH' => $request->input('name'),
            'DiaChi' => $request->input('address'),
            'SDT' => $request->input('phone'),
            'GT' => $request->input('gt')

        ]);
        // dd($customer);
        $customer->save();
    }
    public function createorder(Request $request){
        $order = Order::create([
            'DonID' => $request->input('dhid'),
            'customer_id' => $request->input('customer_id'),
            'SoKhach' => $request->input('sk'),
            'TrangThai' => $request->input('tt')
        ]);
        $order->save();
    }
    public function ghidh(Request $request){

        // dd($request);
        $ghidh = DB::table('ghidhs')->insert([
            'order_id' => $request->input('order_id'),
            'dish_id' => $request->input('dish_id'),
            'SoLuong' => $request->input('sl'),
        ]);
    }
    public function createbill(Request $request){
        $bill = Bill::create([
            'HDID' => $request->input('hdid'),
            'order_id' => $request->input('order_id'),
            'staff_id' => $request->input('staff_id'),
        ]);
    }
    public function store(Request $request){
        DB::beginTransaction();
            try{
                //them khach hang
                // dd($request);
                if(!empty($request->input('khid'))){
                    $this->createcus($request);
                }
                //them don hang
                if(!empty($request->input('dhid')) && !empty($request->input('customer_id'))){
                    $this->createorder($request);
                }
                //them ghi don hang
                if(!empty($request->input('dish_id')) && !empty($request->input('order_id'))){
                    $this->ghidh($request);
                }
                //them hoa don
                if(!empty($request->input('hdid')) && !empty($request->input('staff_id')) && !empty($request->input('order_id'))){
                    $this->createbill($request);
                }
                DB::commit();
                return redirect()->route('sales');
            } catch(\Exception $e){
                dd($e->getMessage());
            DB::rollBack();

            // Xử lý lỗi nếu cần
            return redirect()->back()->with('error', 'Có lỗi xảy ra.');
            }

    }
    ///bill
    public function billindex(){
        $key = request()->key;
        $list_bill = Bill::search($key)->get();
        $list_gdh = DB::table('ghidhs')->select('order_id', 'dish_id', 'SoLuong')->get();
        $prices = DB::table('prices')->select('dish_id', 'Gia')->get();
        $list_dish = Dish::all();

        return view('bills_manager.bill', compact('list_bill', 'list_gdh','prices','list_dish'));
    }

    public function edit($HDID){
        $bill = DB::table('bills')->where('HDID',$HDID)
        ->select('HDID','created_at','order_id','PhuThu','staff_id')->first();
        return view('bills_manager.editbill',compact('bill'));
    }

    public function update(Request $request, $HDID){
        $bill = DB::table('bills')->where('HDID',$HDID)
        ->update([
            'HDID'=>$request->HDID,
            'created_at'=>$request->created_at,
            'PhuThu'=>$request->PhuThu,
            'order_id'=>$request->order_id,
            'staff_id'=>$request->staff_id,
        ]);
        return redirect()->route('bills');
    }

    public function billdelete($id){
        $bill = DB::table('bills')->where('HDID',$id);
        $bill->delete();
        return redirect()->route('bills');
    }
    ///update bill
    public function printbill(){
        // $bill = Bill::all()->first();
        // $order = Order::all()->first();
        // $customer = Customer::all()->first();
        // $staff = Staff::all()->first();
        // $price = DB::table('prices')->select('dish_id', 'Gia')->first();
        // $gdh = DB::table('ghidhs')->select('dish_id', 'order_id', 'SoLuong')->first();

        $info = DB::table('bills')
            ->join('staffs', 'bills.staff_id', '=', 'staffs.NVID')
            ->join('orders', 'bills.order_id', '=', 'orders.DonID')
            ->join('customers', 'orders.customer_id', '=', 'customers.KHID')
            ->join('ghidhs', 'orders.DonID', '=', 'ghidhs.order_id')
            ->join('dishes', 'ghidhs.dish_id', '=', 'dishes.MonID')
            ->join('prices', 'dishes.MonID', '=', 'prices.dish_id')
            ->select('orders.DonID','bills.HDID', 'bills.created_at', 'customers.KHID', 'customers.TenKH','customers.SDT',
                'staffs.NVID', 'staffs.TenNV', 'dishes.TenMon', 'dishes.DVT', 'ghidhs.SoLuong', 'prices.Gia')
            ->get();
        return view('bills_manager.printbill', compact('info'));
    }
    public function billupdate(Request $request, $id){
        // dd($request, $id);
        $total = $request->input('sum') + $request->input('pt');
        // dd($total);
        $bill = DB::table('bills')->where('HDID', $id)
            ->update([
                'PhuThu' => $request->input('pt'),
                'TongTien' => $total,
            ]);
        $order = DB::table('orders')->where('DonID', $request->input('tt_order'))
            ->update([
                'TrangThai' => 2,
            ]);
        return redirect()->route('bills');
    }
}
