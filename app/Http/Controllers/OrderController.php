<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\DataTables\OrderDataTable;

class OrderController extends Controller
{
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('orders.index');
    }

    public function show($orderId)
    {
        $order = Order::with('order_details.product_customer', 'order_status', 'customer', 'supervisor')->findOrFail($orderId);
        return response()->json($order);
    }
}
