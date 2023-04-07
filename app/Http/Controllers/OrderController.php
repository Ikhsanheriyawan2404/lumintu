<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use InvalidArgumentException;
use App\Models\ProductCustomer;
use App\DataTables\OrderDataTable;
use App\Models\BridgeOrderProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderStoreRequest;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('orders.index');
    }

    public function show($orderId)
    {
        $order = Order::with('order_details.product_customer.product', 'order_status', 'customer', 'supervisor')
            ->findOrFail($orderId);

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

        $row[] = '<input type="text" name="price[]" data-id="' . $product->product_id . '" class="form-control price" value="' . number_format($product->price, 0, ',', '.') . '" disabled>';

        $row[] = '<input type="number" name="qty[]" data-id="' . $product->product_id . '" class="form-control qty" value="0">';

        $row[] = '<input type="text" name="subtotal[]" class="form-control subtotal" data-id="' . $product->product_id . '" value="0" disabled>';

        $row[] = '<a class="btn btn-sm btn-outline-danger btn-icon removeProduct"><em class="fa fa-trash"></em></a>';

        return response()->json($row);
    }

    public function store(OrderStoreRequest $request)
    {
        try {

            $request->validated();

            DB::transaction(function () {

                $data = [
                    'customer_id' => request('customer_id'),
                    'order_date' => request('order_date'),
                    'estimate_date' => request('estimate_date'),
                    'description' => request('description'),
                    'total_price' => 0,
                    'supervisor_id' => auth()->user()->id,
                ];

                $order = Order::create($data);

                // Add new order details
                $totalRequestItem = request('product_id');
                if ($totalRequestItem == null) {
                    throw new InvalidArgumentException('Barang tidak boleh kosong', 400);
                } else {
                    $totalPrice = 0;
                    for ($i = 0; $i < count($totalRequestItem); $i++) {
                        $product = ProductCustomer::where('product_id', request('product_id')[$i])
                            ->where('user_id', request('customer_id'))
                            ->first();

                        $data = [
                            'order_id' => $order->id,
                            'product_customer_id' => request('product_id')[$i],
                            'qty' => request('qty')[$i],
                        ];

                        BridgeOrderProduct::create($data);

                        $totalPrice += $product->price * $data['qty'];
                    }
                }

                /**
                 * Update All About Accumulated from purchase details
                 * Why this proccess on the controller? cuz to avoid manipulate input in view from users
                 */
                $order->total_price = $totalPrice;
                $order->save();
            });

        } catch (InvalidArgumentException $e) {

            return response()->json([
                'message' => $e->getMessage(),
            ], $e->getCode());
        }

        return response()->json([
            'message' => 'Berhasil Menambahkan Order Pembelian',
        ]);
    }
}
