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
    return view('customer.home');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::post('/registerUser',[UserController::class, 'doRegis']);
Route::post('/loginUser',[UserController::class, 'doLogin']);
Route::post('/logoutUser',[UserController::class, 'doLogout']);
Route::post('/registerSupp',[SupplierController::class, 'doRegis']);
Route::post('/loginSupp',[SupplierController::class, 'doLogin']);

Route::get('/product', function () {
    return view('customer.product');
});

//session usertype = -1
Route::middleware(['admin'])->group(function () {

});

//session usertype = 0
Route::middleware(['user'])->group(function () {

});

//session usertype = 1
Route::middleware(['supplier'])->group(function () {

});

//session usertype = 2
Route::middleware(['shop'])->group(function () {

});
