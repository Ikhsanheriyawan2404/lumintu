<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('landing.home');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/summary', [DashboardController::class, 'summary'])->name('dashboard.summary');
    Route::get('/dashboard/chart', [DashboardController::class, 'chart'])->name('dashboard.chart');

    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('orders/product-datatables/{customerId}', [OrderController::class, 'productDatatables']);
    Route::get('orders/{productId}/product', [OrderController::class, 'getProduct']);
    Route::get('orders/{orderId}/details', [OrderController::class, 'getOrderDetails']);
    Route::post('orders/{orderId}/change-status', [OrderController::class, 'changeOrderStatus'])->name('orders.changeOrderStatus');
    Route::resource('orders', OrderController::class);
    Route::resource('users', UserController::class);

    require __DIR__ . '/pegawai/pegawai.php';


    /*
    |--------------------------------------------------------------------------
    | Temporary Routes
    */

    Route::resource('valet', ValetController::class);
    Route::get('hotel/{userId}/price-list-view', [HotelController::class, 'getPriceList'])->name('hotel.price-list.view');
    Route::post('hotel/{userId}/price-list', [HotelController::class, 'updatePriceList'])->name('hotel.price-list');
    Route::resource('hotel', HotelController::class);
    Route::resource('pegawai', PegawaiController::class);

    Route::post('hotels/price-list', [HotelController::class, 'storePriceList'])->name('hotel.price-list.store');

    /*
    |--------------------------------------------------------------------------
    */
});
