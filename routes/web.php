<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\FoodgrController;
use App\Http\Controllers\CustomerController;


//<staff>
//</staff>
//<shift>
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
