<?php

use App\Http\Controllers\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Http\Controllers\GhidhController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\FoodgrController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DhbananController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\DinnertableController;

Route::middleware(['web','guest'])->group(function () {
    Route::match(['get', 'post'], 'login', [Login::class, 'index'])->name('login');
});

Route::middleware(['web','auth'])->group(function () {
    Route::get('/', [Login::class, 'home'])->name('home');
    Route::get('/logout', [Login::class, 'logout'])->name('logout');
    Route::get('/profile', [Login::class, 'show'])->name('profile');
    Route::get('profile/{NVID}', [Login::class, 'edit'])->name('profile.edit');
    Route::match(['put','patch'], 'profile/{NVID}', [Login::class, 'update'])->name('profile.update');


//<staff> ->middleware('permission.checker:admin|cashier|staff');
    Route::get('staffs', [StaffController::class, 'index'])->name('staffs')->middleware('permission.checker:admin');
    Route::get('staffs/create', [StaffController::class, 'create'])->name('staffs.create')->middleware('permission.checker:admin');
    Route::post('staffs',[StaffController::class,'store'])->name('staffs.store')->middleware('permission.checker:admin');
    Route::get('staffs/{NVID}', [StaffController::class, 'edit'])->name('staffs.edit')->middleware('permission.checker:admin');
    Route::match(['put','patch'],'staffs/{NVID}', [StaffController::class, 'update'])->name('staffs.update')->middleware('permission.checker:admin');
    Route::delete('staffs/{NVID}',[StaffController::class, 'destroy'])->name('staffs.destroy')->middleware('permission.checker:admin');
//<salary>
    Route::get('/salaries', [StaffController::class, 'staff_salary'])->name('salaries')->middleware('permission.checker:admin|cashier|staff');
//</salary>
//</staff>
//<shift>
    Route::get('shifts', [ShiftController::class, 'index'])->name('shifts')->middleware('permission.checker:admin|cashier|staff');
    Route::get('shifts/create', [ShiftController::class, 'create'])->name('shifts.create')->middleware('permission.checker:admin');
    Route::post('shifts',[ShiftController::class,'store'])->name('shifts.store')->middleware('permission.checker:admin');
    Route::get('shifts/{CaID}', [ShiftController::class, 'edit'])->name('shifts.edit')->middleware('permission.checker:admin');
    Route::match(['put','patch'],'shifts/{CaID}', [ShiftController::class, 'update'])->name('shifts.update')->middleware('permission.checker:admin');
    Route::delete('shifts/{CaID}',[ShiftController::class, 'destroy'])->name('shifts.destroy')->middleware('permission.checker:admin');
//</shift>
//<customer>
    Route::get('customers', [CustomerController::class, 'index'])->name('customers')->middleware('permission.checker:admin|cashier|staff');
    Route::get('customers/create', [CustomerController::class, 'create'])->name('customers.create')->middleware('permission.checker:admin|cashier|staff');
    Route::post('customers',[CustomerController::class,'store'])->name('customers.store')->middleware('permission.checker:admin|cashier|staff');
    Route::get('customers/{KHID}', [CustomerController::class, 'edit'])->name('customers.edit')->middleware('permission.checker:admin|cashier|staff');
    Route::match(['put','patch'],'customers/{KHID}', [CustomerController::class, 'update'])->name('customers.update')->middleware('permission.checker:admin|cashier|staff');
    Route::delete('customers/{KHID}',[CustomerController::class, 'destroy'])->name('customers.destroy')->middleware('permission.checker:admin|cashier|staff');
//</customer>
//<dish>
    Route::get('dishes', [DishController::class, 'index'])->name('dishes')->middleware('permission.checker:admin|cashier|staff');
    Route::get('dishes/create', [DishController::class, 'create'])->name('dishes.create')->middleware('permission.checker:admin|cashier');
    Route::post('dishes',[DishController::class,'store'])->name('dishes.store')->middleware('permission.checker:admin|cashier');
    Route::get('dishes/{MonID}', [DishController::class, 'edit'])->name('dishes.edit')->middleware('permission.checker:admin|cashier');
    Route::match(['put','patch'],'dishes/{MonID}', [DishController::class, 'update'])->name('dishes.update')->middleware('permission.checker:admin|cashier');
    Route::delete('dishes/{MonID}',[DishController::class, 'destroy'])->name('dishes.destroy')->middleware('permission.checker:admin|cashier');
//</dish>
//<food group>
    Route::get('foodgrs', [FoodgrController::class, 'index'])->name('foodgrs')->middleware('permission.checker:admin|cashier|staff');
    Route::get('foodgrs/create', [FoodgrController::class, 'create'])->name('foodgrs.create')->middleware('permission.checker:admin|cashier');
    Route::post('foodgrs',[FoodgrController::class,'store'])->name('foodgrs.store')->middleware('permission.checker:admin|cashier');
    Route::get('foodgrs/{NhomID}', [FoodgrController::class, 'edit'])->name('foodgrs.edit')->middleware('permission.checker:admin|cashier');
    Route::match(['put','patch'],'foodgrs/{NhomID}', [FoodgrController::class, 'update'])->name('foodgrs.update')->middleware('permission.checker:admin|cashier');
    Route::delete('foodgrs/{NhomID}',[FoodgrController::class, 'destroy'])->name('foodgrs.destroy')->middleware('permission.checker:admin|cashier');
//</food group>
//<price>
    Route::get('prices', [PriceController::class, 'index'])->name('prices')->middleware('permission.checker:admin|cashier|staff');
    Route::get('prices/create', [PriceController::class, 'create'])->name('prices.create')->middleware('permission.checker:admin');
    Route::post('prices',[PriceController::class,'store'])->name('prices.store')->middleware('permission.checker:admin');
    Route::get('prices/{dish_id}/{day_id}', [PriceController::class, 'edit'])->name('prices.edit')->middleware('permission.checker:admin');
    Route::match(['put','patch'],'prices/{dish_id}/{day_id}', [PriceController::class, 'update'])->name('prices.update')->middleware('permission.checker:admin');
    Route::delete('prices/{dish_id}/{day_id}',[PriceController::class, 'destroy'])->name('prices.destroy')->middleware('permission.checker:admin');
//</price>
//<dinner table>
    Route::get('dinnertbs', [DinnertableController::class, 'index'])->name('dinnertbs')->middleware('permission.checker:admin|cashier|staff');
    Route::get('dinnertbs/create', [DinnertableController::class, 'create'])->name('dinnertbs.create')->middleware('permission.checker:admin|cashier');
    Route::post('dinnertbs',[DinnertableController::class,'store'])->name('dinnertbs.store')->middleware('permission.checker:admin|cashier');
    Route::get('dinnertbs/{BanID}', [DinnertableController::class, 'edit'])->name('dinnertbs.edit')->middleware('permission.checker:admin|cashier');
    Route::match(['put','patch'],'dinnertbs/{BanID}', [DinnertableController::class, 'update'])->name('dinnertbs.update')->middleware('permission.checker:admin|cashier');
    Route::delete('dinnertbs/{BanID}',[DinnertableController::class, 'destroy'])->name('dinnertbs.destroy')->middleware('permission.checker:admin|cashier');
//</dinner table>
//<dh_banan>
    Route::get('dh_banans', [DhbananController::class, 'index'])->name('dh_banans')->middleware('permission.checker:admin|cashier|staff');
    Route::get('dh_banans/create', [DhbananController::class, 'create'])->name('dh_banans.create')->middleware('permission.checker:admin|cashier|staff');
    Route::post('dh_banans',[DhbananController::class,'store'])->name('dh_banans.store')->middleware('permission.checker:admin|cashier|staff');
    Route::get('dh_banans/{order_id}/{dinnertb_id}', [DhbananController::class, 'edit'])->name('dh_banans.edit')->middleware('permission.checker:admin|cashier|staff');
    Route::match(['put','patch'],'dh_banans/{order_id}/{dinnertb_id}', [DhbananController::class, 'update'])->name('dh_banans.update')->middleware('permission.checker:admin|cashier|staff');
    Route::delete('dh_banans/{order_id}/{dinnertb_id}',[DhbananController::class, 'destroy'])->name('dh_banans.destroy')->middleware('permission.checker:admin|cashier|staff');
//</dh_banan>
//<sales>
    Route::get('sales', [SalesController::class, 'index'])->name('sales')->middleware('permission.checker:admin|cashier|staff');
    Route::post('sales',[SalesController::class,'store'])->name('sales.store')->middleware('permission.checker:admin|cashier|staff');

    Route::get('create_bill/{DonID}',[SalesController::class,'create_bill'])->name('create_bill')->middleware('permission.checker:admin|cashier');
    Route::post('create_bill',[SalesController::class,'createbill'])->name('createbill')->middleware('permission.checker:admin|cashier');
    Route::match(['put', 'get'],'bill_huy/{DonID}',[SalesController::class,'bill_huy'])->name('bill_huy')->middleware('permission.checker:admin|cashier');

    Route::get('bills',[SalesController::class,'billindex'])->name('bills')->middleware('permission.checker:admin|cashier|staff');
    Route::get('bills/{HDID}',[SalesController::class,'edit'])->name('bills.edit')->middleware('permission.checker:admin|cashier');
    Route::match(['put', 'patch'], 'bills/{HDID}',[SalesController::class,'update'])->name('bills.update')->middleware('permission.checker:admin|cashier');
    Route::delete('bills/{HDID}',[SalesController::class,'billdelete'])->name('bills.delete')->middleware('permission.checker:admin');

    Route::get('pay/{HDID}',[SalesController::class,'printbill'])->name('pay')->middleware('permission.checker:admin|cashier');
    Route::match(['put', 'patch'],'pay/{HDID}',[SalesController::class,'billupdate'])->name('pay.update')->middleware('permission.checker:admin|cashier');

    Route::get('sales/{dish_id}/{order_id}', [SalesController::class, 'edit_ct'])->name('chitiet.edit')->middleware('permission.checker:admin|cashier|staff');
    Route::match(['put','patch'],'sales/{dish_id}/{order_id}', [SalesController::class, 'update_ct'])->name('chitiet.update')->middleware('permission.checker:admin|cashier|staff');
    Route::delete('sales/{dish_id}/{order_id}',[SalesController::class, 'destroy_ct'])->name('chitiet.destroy')->middleware('permission.checker:admin|cashier|staff');
//</sales>
//<order>
    Route::get('orders', [OrderController::class, 'index'])->name('orders')->middleware('permission.checker:admin|cashier|staff');
    Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create')->middleware('permission.checker:admin|cashier|staff');
    Route::post('orders',[OrderController::class,'store'])->name('orders.store')->middleware('permission.checker:admin|cashier|staff');
    Route::get('orders/{DonID}/show',[OrderController::class,'show'])->name('orders.show')->middleware('permission.checker:admin|cashier|staff');
    Route::get('orders/{DonID}', [OrderController::class, 'edit'])->name('orders.edit')->middleware('permission.checker:admin|cashier|staff');
    Route::match(['put','patch'],'orders/{DonID}', [OrderController::class, 'update'])->name('orders.update')->middleware('permission.checker:admin|cashier|staff');
    Route::delete('orders/{DonID}',[OrderController::class, 'destroy'])->name('orders.destroy')->middleware('permission.checker:admin|cashier|staff');

    Route::get('orders/{dish_id}/{order_id}', [OrderController::class, 'edit_ct'])->name('ct.edit')->middleware('permission.checker:admin|cashier|staff');
    Route::match(['put','patch'],'orders/{dish_id}/{order_id}', [OrderController::class, 'update_ct'])->name('ct.update')->middleware('permission.checker:admin|cashier|staff');
    Route::delete('orders/{dish_id}/{order_id}',[OrderController::class, 'destroy_ct'])->name('ct.destroy')->middleware('permission.checker:admin|cashier|staff');
//</order>
//<ghidh>
    Route::get('ghidhs', [GhidhController::class, 'index'])->name('ghidhs')->middleware('permission.checker:admin|cashier|staff');
    Route::get('ghidhs/create', [GhidhController::class, 'create'])->name('ghidhs.create')->middleware('permission.checker:admin|cashier|staff');
    Route::post('ghidhs',[GhidhController::class,'store'])->name('ghidhs.store')->middleware('permission.checker:admin|cashier|staff');
    Route::get('ghidhs/{dish_id}/{order_id}', [GhidhController::class, 'edit'])->name('ghidhs.edit')->middleware('permission.checker:admin|cashier|staff');
    Route::match(['put','patch'],'ghidhs/{dish_id}/{order_id}', [GhidhController::class, 'update'])->name('ghidhs.update')->middleware('permission.checker:admin|cashier|staff');
    Route::delete('ghidhs/{dish_id}/{order_id}',[GhidhController::class, 'destroy'])->name('ghidhs.destroy')->middleware('permission.checker:admin|cashier|staff');
//</ghidh>
//<phancong assignment>
    Route::get('assignments', [AssignmentController::class, 'index'])->name('assignments')->middleware('permission.checker:admin|cashier|staff');
    Route::get('assignments/create', [AssignmentController::class, 'create'])->name('assignments.create')->middleware('permission.checker:admin');
    Route::post('assignments',[AssignmentController::class,'store'])->name('assignments.store')->middleware('permission.checker:admin');
    Route::get('assignments/{staff_id}/{day_id}/{dinnertb_id}', [AssignmentController::class, 'edit'])->name('assignments.edit')->middleware('permission.checker:admin')->middleware('permission.checker:admin');
    Route::match(['put','patch'],'assignments/{staff_id}/{day_id}/{dinnertb_id}', [AssignmentController::class, 'update'])->name('assignments.update')->middleware('permission.checker:admin');
    Route::delete('assignments/{staff_id}/{day_id}/{dinnertb_id}',[AssignmentController::class, 'destroy'])->name('assignments.destroy')->middleware('permission.checker:admin');
//</phancong assignment>
//<sign up>
    Route::get('signups', [SignupController::class, 'index'])->name('signups')->middleware('permission.checker:admin|cashier|staff');
    Route::get('signups/create', [SignupController::class, 'create'])->name('signups.create')->middleware('permission.checker:admin|cashier|staff');
    Route::post('signups',[SignupController::class,'store'])->name('signups.store')->middleware('permission.checker:admin|cashier|staff');
    Route::get('signups/{staff_id}/{day_id}/{shift_id}', [SignupController::class, 'edit'])->name('signups.edit')->middleware('permission.checker:admin|cashier|staff');
    Route::match(['put','patch'],'signups/{staff_id}/{day_id}/{shift_id}', [SignupController::class, 'update'])->name('signups.update')->middleware('permission.checker:admin|cashier|staff');
    Route::delete('signups/{staff_id}/{day_id}/{shift_id}',[SignupController::class, 'destroy'])->name('signups.destroy')->middleware('permission.checker:admin');
//</sign up>
//<reveneu>
    Route::get('revenue', [RevenueController::class, 'index'])->name('revenue')->middleware('permission.checker:admin');
    Route::post('revenue', [RevenueController::class, 'see_revenue'])->name('see_revenue')->middleware('permission.checker:admin');
    //<403>
        Route::get('403', [RevenueController::class, 'index403'])->name('403');
    //</403>
//</reveneu>

});











/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





// Route::get('/', function () {
//     return view('bills_manager.bill');
// });
