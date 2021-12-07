<?php

use App\Http\Controllers\ShopController;
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
Route::post('/registerUser', [UserController::class, 'doRegis']);
Route::post('/loginUser', [UserController::class, 'doLogin']);
Route::get('/logoutUser', [UserController::class, 'doLogout']);
Route::post('/registerSupp', [SupplierController::class, 'doRegis']);
Route::post('/loginSupp', [SupplierController::class, 'doLogin']);

Route::get('/product', function () {
    return view('customer.product');
});
Route::get('/search', [ShopController::class, 'search']);
Route::get('/detail/{id}', [ShopController::class, 'detail']);

//session usertype = 0
Route::middleware(['user'])->group(function () {
    Route::post('/doEditProfile', [UserController::class, 'doUpdateProfile']);
    Route::get('/editCart', [UserController::class, 'ajaxUpdateCart']);
    Route::get('/addCart/{id}', [UserController::class, 'addToCart']);
    Route::post('/addCartA', [UserController::class, 'addToCart']);
    Route::post('/topup', [UserController::class, 'topUp']);
    Route::get('/doOrder', [UserController::class, 'doOrder']);
    Route::get('/cart', function () {
        return view('customer.cart');
    });
    Route::get('/profile', function () {
        return view('customer.profile');
    });
    Route::get('/history', function () {
        return view('customer.history');
    });
});

//session usertype = 1
Route::middleware(['supplier'])->group(function () {
    Route::prefix('supplier')->group(function () {
        Route::get('/', [SupplierController::class, 'toSuppHome']);
        Route::get('/add', [SupplierController::class, 'toSuppAdd']);
        Route::post('/doAddBook', [SupplierController::class, 'doAdd']);
    });
});
// Route::get('supphome', [SupplierController::class, 'toSuppHome']);
// Route::get('suppadd', [SupplierController::class, 'toSuppAdd']);

//session usertype = 2
Route::middleware(['shop'])->group(function () {
});
