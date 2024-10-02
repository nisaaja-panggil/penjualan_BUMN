<?php

use App\Http\Controllers\barangcontroller;
use App\Http\Controllers\penjualcontroller;
use App\Http\Controllers\pembelicontroller;
use Illuminate\Support\Facades\Route;

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
    return view('dasbord',[
        "title"=>"Dashboard"
    ]);
});
Route::resource('barang', barangcontroller::class);
Route::POST('caribarang',[barangcontroller::class,'cari'])->name('caribarang');
Route::resource('penjual', penjualcontroller::class);
Route::resource('pembeli', pembelicontroller::class);