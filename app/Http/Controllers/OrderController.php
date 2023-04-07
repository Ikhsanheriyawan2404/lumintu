<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\ProductCustomer;
use App\DataTables\OrderDataTable;
use Yajra\DataTables\Facades\DataTables;

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

    public function create()
    {
        return view('orders.create', [
            'customers' => User::role('hotel')->get(),
        ]);
    }

    public function productDatatables($customerId)
    {
        if (request()->ajax()) {
            $productCustomer = ProductCustomer::with('product')->where('user_id', $customerId)->get();
            return DataTables::of($productCustomer)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-sm btn-primary chooseProduct" data-id="' . $row->product_id . '">
                    Pilih <i class="fa fa-check-circle">
                    </button>';
                })
                ->rawColumns(['action', 'path'])
                ->make(true);
        }
    }

    public function getProduct($productId)
    {
        $product = ProductCustomer::with('product')->findOrFail($productId);

        $row = [];

        $row[] = '<input name="product_id[]" type="hidden" value="' . $product->product_id . '" class="form-control">' . $product->product->name;

        $row[] = '<input type="number" name="price[]" data-id="' . $product->product_id . '" class="form-control price" value="' . $product->price . '" disabled>';

        $row[] = '<input type="number" name="qty[]" data-id="' . $product->product_id . '" class="form-control qty" value="0">';

        $row[] = '<input type="number" name="subtotal[]" class="form-control subtotal" data-id="' . $product->product_id . '" value="0" disabled>';

        $row[] = '<a class="btn btn-sm btn-outline-danger btn-icon removeProduct"><em class="fa fa-trash"></em></a>';

        return response()->json($row);
    }
}
