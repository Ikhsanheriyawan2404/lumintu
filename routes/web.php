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
use App\Http\Controllers\PaymentController;

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

    Route::group(['middleware' => 'role:superadmin|admin'], function () {

        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);

        Route::resource('hotel', HotelController::class);
        Route::resource('pegawai', PegawaiController::class);

        Route::resource('users', UserController::class);

        Route::post('orders/{order:id}/approve-payment', [PaymentControllerb::class, 'approvePayment'])
            ->name('orders.paid');

        Route::post('orders/{orderId}/change-status', [OrderController::class, 'changeOrderStatus'])
            ->name('orders.changeOrderStatus');
    });

    Route::group(['middleware' => 'role:valet'], function () {

        Route::get('orders/{orderId}/acc-order', [OrderController::class, 'accOrder'])
            ->name('orders.acc-order');

        Route::post('orders/{orderId}/acc-order-proccess', [OrderController::class, 'accOrderByValet'])
            ->name('orders.acc-order-process');

        Route::get('orders/{orderId}/product-edit', [OrderController::class, 'getProductEdit']);

    });

    Route::group(['middleware' => 'role:hotel'], function () {

        Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');
        Route::post('orders', [OrderController::class, 'store'])->name('orders.store');

        Route::get('hotel/{userId}/price-list-view', [HotelController::class, 'getPriceList'])
            ->name('hotel.price-list.view');

        Route::post('hotel/{userId}/price-list', [HotelController::class, 'updatePriceList'])->name('hotel.price-list');

        Route::get('orders/product-datatables/{customerId}', [OrderController::class, 'productDatatables']);

        Route::get('orders/{productId}/product', [OrderController::class, 'getProduct']);

        Route::get('orders/{orderId}/details', [OrderController::class, 'getOrderDetails']);

        Route::post('payments/payment-documents', [PaymentController::class, 'uploadPayment'])
            ->name('payments.upload');

    });

    Route::get('payments/{orderId}/payment-documents', [PaymentController::class, 'datatables'])
        ->name('payments.datatables')->middleware(['role:superadmin|admin|hotel']);

    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

    Route::get('orders/{orderId}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('orders/{orderId}/edit', [OrderController::class, 'edit'])->name('orders.edit');

    Route::resource('valet', ValetController::class);

    require __DIR__ . '/pegawai/pegawai.php';


    Route::post('hotels/price-list', [HotelController::class, 'storePriceList'])->name('hotel.price-list.store');

    Route::get('invoice/data', function () {
        return view('admin.orders.invoice.invoice');
    });

    Route::get('invoice/print', function () {
        return view('admin.orders.invoice.print_invoice');
    });

    Route::get('reports/bulanan', function () {
        return view('admin.orders.report.bulanan');
    });

    Route::get('reports/harian', function () {
        return view('admin.orders.report.harian');
    });
});
