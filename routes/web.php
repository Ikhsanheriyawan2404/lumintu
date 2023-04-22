<?php

use App\Mail\OrderNotification;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('landing.home');
});
//mail
Route::get('/mail', function () {
    return new OrderNotification();
});
Route::get('/profile', function () {
    return view('landing.pages.detail_perusahaan');
});
Route::get('/program', function () {
    return view('landing.pages.detail_program');
});

Route::get('/login', function () {
    return view('login');
})->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'active'])->group(function () {

    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/summary', [DashboardController::class, 'summary'])->name('dashboard.summary');
    Route::get('/dashboard/chart-order', [DashboardController::class, 'chartOrder'])->name('dashboard.chartOrder');
    Route::get('/dashboard/chart-bar', [DashboardController::class, 'chartBar'])->name('dashboard.chartBar');
    Route::get('/dashboard/customer-ordered', [DashboardController::class, 'customerOrdered'])->name('dashboard.customer-ordered');

    Route::group(['middleware' => 'role:superadmin|admin'], function () {
        require __DIR__ . '/admin/masterPembayaran.php';
        require __DIR__ . '/admin/pengeluaran.php';

        Route::get('exportpdfcost', [CostController::class, 'exportPdf'])->name('export.pdf');
        Route::get('exportpdfpesanan', [OrderController::class, 'exportPdf'])->name('export.pdf.pengeluran');


        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);

        Route::resource('hotel', HotelController::class);
        Route::resource('pegawai', PegawaiController::class);

        // Nontatikf/Aktif users
        Route::post('users/{userId}/status', [UserController::class, 'changeStatus']);
        Route::get('users', [UserController::class, 'index'])->name('users.index');


        // Cancel and Approve order payment
        Route::post('orders/{order:id}/approve-payment', [PaymentController::class, 'approvePayment'])
            ->name('orders.paid');
        Route::post('orders/{order:id}/cancel-payment', [PaymentController::class, 'cancelPayment'])
            ->name('orders.unpaid');

        Route::post('orders/{id}/delete', [OrderController::class, 'delete'])->name('orders.delete');
        Route::post('orders/{orderId}/change-status', [OrderController::class, 'changeOrderStatus'])
            ->name('orders.changeOrderStatus');

        Route::post('orders/export-excel', [OrderController::class, 'exportExcel'])
            ->name('orders.export-excel');

        Route::post('/cost/export-excel', [CostController::class, 'exportExcel'])->name('costs.export-excel');
        Route::resource('cost', CostController::class);
    });

    Route::group(['middleware' => 'role:valet'], function () {

        Route::get('orders/{orderId}/acc-order', [OrderController::class, 'accOrder'])
            ->name('orders.acc-order');

        Route::post('orders/{orderId}/acc-order-proccess', [OrderController::class, 'accOrderByValet'])
            ->name('orders.acc-order-process');

    });

    Route::group(['middleware' => 'role:hotel'], function () {
        Route::post('payments/payment-documents', [PaymentController::class, 'uploadPayment'])
            ->name('payments.upload');
        Route::post('orders/{id}/delete', [OrderController::class, 'delete'])->name('orders.delete');
        Route::post('orders/{id}/update', [OrderController::class, 'update'])->name('orders.update');
        Route::post('orders/{orderId}/done-hotel', [OrderController::class, 'doneOrder']);

    });

    Route::get('orders/{orderId}/product-edit', [OrderController::class, 'getProductEdit'])->middleware(['role:valet|hotel']);

    Route::get('orders/{orderId}/details', [OrderController::class, 'getOrderDetails'])
        ->middleware(['role:superadmin|admin|hotel']);

    Route::get('orders/{productId}/product', [OrderController::class, 'getProductToPutOnListOrderTable'])
        ->middleware(['role:superadmin|admin|hotel']);

    Route::get('orders/product-datatables/{customerId}', [OrderController::class, 'listProductDatatables'])
        ->middleware(['role:superadmin|admin|hotel']);

    // Halaman create order dan membuat order
    Route::get('orders/create', [OrderController::class, 'create'])
        ->name('orders.create')
        ->middleware(['role:superadmin|admin|hotel']);
    Route::post('orders', [OrderController::class, 'store'])
        ->name('orders.store')
        ->middleware(['role:superadmin|admin|hotel']);

    Route::get('payments/{orderId}/payment-documents', [PaymentController::class, 'datatables'])
        ->name('payments.datatables')->middleware(['role:superadmin|admin|hotel']);

    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

    Route::get('orders/{orderId}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('orders/{orderId}/edit', [OrderController::class, 'edit'])->name('orders.edit');

    Route::get('orders/{orderId}/export-pdf', [OrderController::class, 'exportDetailPdf'])
        ->name('orders.export-detail-pdf')
        ->middleware(['role:superadmin|admin|hotel']);

    //    Route::resource('valet', ValetController::class);

    require_once __DIR__ . '/pegawai/pegawai.php';

    // Route price list hotel
    Route::get('hotel/{userId}/price-list-view', [HotelController::class, 'getPriceList'])
        ->name('hotel.price-list.view')
        ->middleware('role:superadmin|admin|hotel');

    Route::post('hotel/{userId}/price-list', [HotelController::class, 'updatePriceList'])
        ->name('hotel.price-list')
        ->middleware('role:superadmin|admin|valet');

    Route::post('hotels/price-list', [HotelController::class, 'storePriceList'])
        ->name('hotel.price-list.store')
        ->middleware('role:superadmin|admin|valet');


    // Temp Route
    Route::get('invoice/data', function () {
        return view('admin.orders.invoice.invoice');
    });

    Route::get('invoice/print', function () {
        return view('admin.orders.invoice.print_invoice');
    });
    //
//    Route::get('reports/bulanan', function () {
//        return view('admin.orders.report.bulanan');
//    });

    //    Route::get('reports/harian', function () {
//        return view('admin.report.cost.bulanan');
//    });

});
Route::get('test', [TestController::class, 'test']);
