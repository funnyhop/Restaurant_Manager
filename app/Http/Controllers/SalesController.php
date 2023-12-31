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
        $maxDonID = DB::table('orders')->max(DB::raw('CAST(SUBSTRING(DonID, 3, 3) AS SIGNED)'));
        $newDonID = 'DH' . str_pad($maxDonID + 1, 3, '0', STR_PAD_LEFT);
        $newghiDonID = 'DH' . str_pad($maxDonID , 3, '0', STR_PAD_LEFT);

        $list_order = DB::table('orders')->select('DonID', 'customer_id', 'SoKhach', 'created_at', 'TrangThai')->get();
        $list_customer = DB::table('customers')->select('KHID', 'TenKH')->get();
        $list_dish = DB::table('dishes')->select('MonID', 'TenMon')->get();
        $list_staff = DB::table('staffs')->select('NVID', 'TenNV')->get();

        $ghidhs = DB::table('ghidhs')
            ->select('order_id', 'dish_id', 'SoLuong')
            ->get();

        return view('sales_manager.index', compact('ghidhs','newghiDonID','newDonID','list_order', 'list_customer', 'list_dish', 'list_staff'));
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
    public function create_bill($id){
        $maxHDID = DB::table('bills')->max(DB::raw('CAST(SUBSTRING(HDID, 3, 3) AS SIGNED)'));//CAST biến chuỗi thành số để phù hợp với hàm max
        $newHDID = 'HD' . str_pad($maxHDID + 1, 3, '0', STR_PAD_LEFT);//3, '0' STR_PAD_LEFT hiển thị bắt buộc 3 ký tự, nếu max = 1 thì sẽ chèn thêm 3 số không vào bên trái số 1

        $order = DB::table('orders')->select('DonID')->where('DonID', $id)->first();
        return view('bills_manager.createbill', compact('order', 'newHDID'));
    }
    public function createbill(Request $request){
        $bill = Bill::create([
            'HDID' => $request->input('hdid'),
            'order_id' => $request->input('order_id'),
            'staff_id' => $request->input('staff_id'),
            'PhuThu' => $request->input('pt'),
        ]);
        return redirect()->route('pay', $request->input('hdid'));
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
    public function printbill($HDID){

        $prices = DB::table('prices')->select('dish_id', 'Gia')->get();
        $gdhs = DB::table('ghidhs')->select('dish_id', 'order_id', 'SoLuong')->get();
        $dishes = DB::table('dishes')->select('MonID', 'TenMon', 'DVT')->get();
        $staffs = Staff::all();
        $customers = Customer::all();
        $orders = Order::all();
        $bill = DB::table('bills')->where('HDID',$HDID)
            ->select('HDID','created_at','order_id','PhuThu','staff_id')->first();
        return view('bills_manager.printbill', compact('bill','staffs','customers','orders','gdhs','dishes','prices'));
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
    public function bill_huy($id){
        $order = DB::table('orders')->where('DonID', $id)
            ->update([
                'TrangThai' => 0,
        ]);
        return redirect()->route('orders');
    }


    public function edit_ct( $dish_id, $order_id)
    {
        $ghidh = DB::table('ghidhs')->select('order_id', 'dish_id')
        ->where('dish_id', $dish_id)
        ->where('order_id', $order_id)
        ->select('order_id', 'dish_id','SoLuong')
        ->first();
        return view('sales_manager.editchitiet', compact('ghidh'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_ct(Request $request, $dish_id, $order_id)
    {
        $ghidh = DB::table('ghidhs')
            ->where('dish_id', $dish_id)
            ->where('order_id', $order_id)
            ->update([
                'order_id' => $request->input('order_id'),
                'dish_id' => $request->input('dish_id'),
                'SoLuong' => $request->input('sl'),
            ]);
        return redirect()->route('sales');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_ct($dish_id, $order_id)
    {
        $ghidh = DB::table('ghidhs')
            ->where('dish_id', $dish_id)
            ->where('order_id', $order_id);
        $ghidh->delete();
        return redirect()->route('sales');
    }
}
