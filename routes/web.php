<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('app');
});

Route::get('/products', [ProductsController::class,'index']);
Route::post('/products',[ProductsController::class,'store']);
Route::put('/products/{id}',[ProductsController::class,'update']);
Route::delete('/products/{id}',[ProductsController::class,'destroy']);