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
    Route::get('/', [Login::class, 'sales'])->name('home');
    Route::get('/logout', [Login::class, 'logout'])->name('logout');
});
//<staff>
    Route::get('staffs', [StaffController::class, 'index'])->name('staffs');
    Route::get('staffs/create', [StaffController::class, 'create'])->name('staffs.create');
    Route::post('staffs',[StaffController::class,'store'])->name('staffs.store');
    Route::get('staffs/{NVID}', [StaffController::class, 'edit'])->name('staffs.edit');
    Route::match(['put','patch'],'staffs/{NVID}', [StaffController::class, 'update'])->name('staffs.update');
    Route::delete('staffs/{NVID}',[StaffController::class, 'destroy'])->name('staffs.destroy');
    //<salary>
        Route::get('/salaries', [StaffController::class, 'staff_salary'])->name('salaries');
    //</salary>
//</staff>
//<shift>
    Route::get('shifts', [ShiftController::class, 'index'])->name('shifts');
    Route::get('shifts/create', [ShiftController::class, 'create'])->name('shifts.create');
    Route::post('shifts',[ShiftController::class,'store'])->name('shifts.store');
    Route::get('shifts/{CaID}', [ShiftController::class, 'edit'])->name('shifts.edit');
    Route::match(['put','patch'],'shifts/{CaID}', [ShiftController::class, 'update'])->name('shifts.update');
    Route::delete('shifts/{CaID}',[ShiftController::class, 'destroy'])->name('shifts.destroy');
//</shift>
//<customer>
    Route::get('customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('customers',[CustomerController::class,'store'])->name('customers.store');
    Route::get('customers/{KHID}', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::match(['put','patch'],'customers/{KHID}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('customers/{KHID}',[CustomerController::class, 'destroy'])->name('customers.destroy');
//</customer>
//<dish>
    Route::get('dishes', [DishController::class, 'index'])->name('dishes');
    Route::get('dishes/create', [DishController::class, 'create'])->name('dishes.create');
    Route::post('dishes',[DishController::class,'store'])->name('dishes.store');
    Route::get('dishes/{MonID}', [DishController::class, 'edit'])->name('dishes.edit');
    Route::match(['put','patch'],'dishes/{MonID}', [DishController::class, 'update'])->name('dishes.update');
    Route::delete('dishes/{MonID}',[DishController::class, 'destroy'])->name('dishes.destroy');
//</dish>
//<food group>
    Route::get('foodgrs', [FoodgrController::class, 'index'])->name('foodgrs');
    Route::get('foodgrs/create', [FoodgrController::class, 'create'])->name('foodgrs.create');
    Route::post('foodgrs',[FoodgrController::class,'store'])->name('foodgrs.store');
    Route::get('foodgrs/{NhomID}', [FoodgrController::class, 'edit'])->name('foodgrs.edit');
    Route::match(['put','patch'],'foodgrs/{NhomID}', [FoodgrController::class, 'update'])->name('foodgrs.update');
    Route::delete('foodgrs/{NhomID}',[FoodgrController::class, 'destroy'])->name('foodgrs.destroy');
//</food group>
//<price>
    Route::get('prices', [PriceController::class, 'index'])->name('prices');
    Route::get('prices/create', [PriceController::class, 'create'])->name('prices.create');
    Route::post('prices',[PriceController::class,'store'])->name('prices.store');
    Route::get('prices/{dish_id}/{day_id}', [PriceController::class, 'edit'])->name('prices.edit');
    Route::match(['put','patch'],'prices/{dish_id}/{day_id}', [PriceController::class, 'update'])->name('prices.update');
    Route::delete('prices/{dish_id}/{day_id}',[PriceController::class, 'destroy'])->name('prices.destroy');
//</price>
//<dinner table>
    Route::get('dinnertbs', [DinnertableController::class, 'index'])->name('dinnertbs');
    Route::get('dinnertbs/create', [DinnertableController::class, 'create'])->name('dinnertbs.create');
    Route::post('dinnertbs',[DinnertableController::class,'store'])->name('dinnertbs.store');
    Route::get('dinnertbs/{BanID}', [DinnertableController::class, 'edit'])->name('dinnertbs.edit');
    Route::match(['put','patch'],'dinnertbs/{BanID}', [DinnertableController::class, 'update'])->name('dinnertbs.update');
    Route::delete('dinnertbs/{BanID}',[DinnertableController::class, 'destroy'])->name('dinnertbs.destroy');
//</dinner table>
//<dh_banan>
    Route::get('dh_banans', [DhbananController::class, 'index'])->name('dh_banans');
    Route::get('dh_banans/create', [DhbananController::class, 'create'])->name('dh_banans.create');
    Route::post('dh_banans',[DhbananController::class,'store'])->name('dh_banans.store');
    Route::get('dh_banans/{order_id}/{dinnertb_id}', [DhbananController::class, 'edit'])->name('dh_banans.edit');
    Route::match(['put','patch'],'dh_banans/{order_id}/{dinnertb_id}', [DhbananController::class, 'update'])->name('dh_banans.update');
    Route::delete('dh_banans/{order_id}/{dinnertb_id}',[DhbananController::class, 'destroy'])->name('dh_banans.destroy');
//</dh_banan>
//<sales>
    Route::get('sales', [SalesController::class, 'index'])->name('sales');
    Route::post('sales',[SalesController::class,'store'])->name('sales.store');
    Route::get('bills',[SalesController::class,'billindex'])->name('bills');
    Route::delete('bills/{HDID}',[SalesController::class,'billdelete'])->name('bills.delete');
    Route::get('pay',[SalesController::class,'printbill'])->name('pay');
    Route::match(['put', 'patch'],'pay/{HDID}',[SalesController::class,'billupdate'])->name('pay.update');
//</sales>
//<order>
    Route::get('orders', [OrderController::class, 'index'])->name('orders');
    Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('orders',[OrderController::class,'store'])->name('orders.store');
    Route::get('orders/{DonID}', [OrderController::class, 'edit'])->name('orders.edit');
    Route::match(['put','patch'],'orders/{DonID}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('orders/{DonID}',[OrderController::class, 'destroy'])->name('orders.destroy');
//</order>
//<ghidh>
    Route::get('ghidhs', [GhidhController::class, 'index'])->name('ghidhs');
    Route::get('ghidhs/create', [GhidhController::class, 'create'])->name('ghidhs.create');
    Route::post('ghidhs',[GhidhController::class,'store'])->name('ghidhs.store');
    Route::get('ghidhs/{dish_id}/{order_id}', [GhidhController::class, 'edit'])->name('ghidhs.edit');
    Route::match(['put','patch'],'ghidhs/{dish_id}/{order_id}', [GhidhController::class, 'update'])->name('ghidhs.update');
    Route::delete('ghidhs/{dish_id}/{order_id}',[GhidhController::class, 'destroy'])->name('ghidhs.destroy');
//</ghidh>
//<phancong assignment>
    Route::get('assignments', [AssignmentController::class, 'index'])->name('assignments');
    Route::get('assignments/create', [AssignmentController::class, 'create'])->name('assignments.create');
    Route::post('assignments',[AssignmentController::class,'store'])->name('assignments.store');
    Route::get('assignments/{staff_id}/{day_id}/{dinnertb_id}', [AssignmentController::class, 'edit'])->name('assignments.edit');
    Route::match(['put','patch'],'assignments/{staff_id}/{day_id}/{dinnertb_id}', [AssignmentController::class, 'update'])->name('assignments.update');
    Route::delete('assignments/{staff_id}/{day_id}/{dinnertb_id}',[AssignmentController::class, 'destroy'])->name('assignments.destroy');
//</phancong assignment>
//<sign up>
    Route::get('signups', [SignupController::class, 'index'])->name('signups');
    Route::get('signups/create', [SignupController::class, 'create'])->name('signups.create');
    Route::post('signups',[SignupController::class,'store'])->name('signups.store');
    Route::get('signups/{staff_id}/{day_id}/{shift_id}', [SignupController::class, 'edit'])->name('signups.edit');
    Route::match(['put','patch'],'signups/{staff_id}/{day_id}/{shift_id}', [SignupController::class, 'update'])->name('signups.update');
    Route::delete('signups/{staff_id}/{day_id}/{shift_id}',[SignupController::class, 'destroy'])->name('signups.destroy');
//</sign up>
//<reveneu>
    Route::get('revenue', [RevenueController::class, 'index'])->name('revenue');
    Route::post('revenue', [RevenueController::class, 'see_revenue'])->name('see_revenue');
//</reveneu>














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
