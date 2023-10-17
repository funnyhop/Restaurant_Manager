<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Http\Controllers\PricesController;


//<staff>
//</staff>
//<shift>
//</shift>
//<customer>
//</customer>
//<dish>
    Route::get('dishes', [DishController::class, 'index'])->name('dishes');
    Route::get('dishes/create', [DishController::class, 'create'])->name('dishes.create');
    Route::post('dishes',[DishController::class,'store'])->name('dishes.store');
    Route::get('dishes/{$id}/edit', [DishController::class, 'edit'])->name('dishes.edit');
    Route::match(['put','patch'],'dishes/{$id}', [DishController::class, 'update'])->name('dishes.update');
    Route::delete('dishes/{$id}',[DishController::class, 'destroy'])->name('dishes.destroy');
//</dish>
//<food group>
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
Route::resource('/prices', PricesController::class);











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
