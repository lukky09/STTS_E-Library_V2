<?php

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;

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
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::post('/registerUser',[UserController::class, 'doRegis']);
Route::post('/loginUser',[UserController::class, 'doLogin']);
Route::post('/registerSupp',[SupplierController::class, 'doRegis']);
Route::post('/loginSupp',[SupplierController::class, 'doLogin']);
