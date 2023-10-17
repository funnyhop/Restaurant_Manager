<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\FoodgrController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DinnertableController;


//<staff>
    Route::get('staffs', [StaffController::class, 'index'])->name('staffs');
    Route::get('staffs/create', [StaffController::class, 'create'])->name('staffs.create');
    Route::post('staffs',[StaffController::class,'store'])->name('staffs.store');
    Route::get('staffs/{NVID}', [StaffController::class, 'edit'])->name('staffs.edit');
    Route::match(['put','patch'],'staffs/{NVID}', [StaffController::class, 'update'])->name('staffs.update');
    Route::delete('staffs/{NVID}',[StaffController::class, 'destroy'])->name('staffs.destroy');
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
//</dh_banan>
//<sales>
//</sales>
//<order>
//</order>
//<ghidh>
//</ghidh>
//<phancong assignment>
//</phancong assignment>
//<sign up>
//</sign up>

//<reveneu>
//</reveneu>
Route::resource('/prices', PriceController::class);











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





Route::get('/', function () {
    return view('restaurant_manager.dishs');
});
Route::get('/res', function () {
    return view('restaurant_manager.createdish');
});
