<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\HomeController;

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

Route::get('user/create',[HomeController::class,'create']);
Route::post('user/store1',[HomeController::class,'store1']);
Route::post('user/store2',[HomeController::class,'store2']);
Route::post('user/store3',[HomeController::class,'store3']);

Route::get('/', function () {
    return view('welcome');
});
