<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Pickup;
use App\Models\OrderStatus;
use InvalidArgumentException;
use App\Models\ProductCustomer;
use App\Enums\OrderStatusEnum;
use App\DataTables\OrderDataTable;
use App\Models\BridgeOrderProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderStoreRequest;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index(OrderDataTable $dataTable)
    {
        if (auth()->user()->hasRole('hotel')) {
            if (request()->ajax()) {
                $orders = Order::with('customer')
                    ->where('customer_id', auth()->user()->id)
                    ->latest()
                    ->get();

                return DataTables::of($orders)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($row) {
                        return '<a href="javascript:void()" data-id="' .$row->id. '" id="showItem">'
                        .$row->created_at.
                        '</a>';
                    })
                    ->editColumn('status', function ($row) {
                        return '<span class="badge badge-sm bg-gradient-primary">'.$row->status->value.'</span>';
                    })
                    ->editColumn('payment_status', function ($row) {
                        return view('hotel.orders.datatables.payment_status', compact('row'));
                    })
                    ->addColumn('action', function ($row) {
                        return view('hotel.orders.datatables.action', compact('row'));
                    })
                    ->rawColumns(['action', 'created_at', 'payment_status', 'status'])
                    ->make(true);
            }

            return view('hotel.orders.index');

        } elseif (auth()->user()->hasRole('valet')) {
            $orders = Order::with('pickups', 'deliveries', 'customer')
                ->whereHas('pickups', function ($query) {
                    $query->where('user_id', auth()->user()->id);
                })
                ->orWhereHas('deliveries', function ($query) {
                    $query->where('user_id', auth()->user()->id);
                })
                ->latest();

            return $dataTable->with([
                'query' => $orders
            ])->render('admin.orders.index');

        } else {
            $query = Order::orderBy('orders.created_at', 'desc')
            ->with('customer');
            return $dataTable->with([
                'query' => $query
            ])->render('admin.orders.index');
        }
    }

    public function show($orderId)
    {
        $order = Order::with('order_details.product_customer.product', 'order_status', 'customer')
            ->findOrFail($orderId);

        return view('admin.orders.show', [
            'order' => $order,
            'order_statuses' => OrderStatus::where('order_id', $orderId)->get(),
            'valet' => User::role('valet')->get()
        ]);
    }

    public function edit($orderId)
    {
        $order = Order::with('order_details.product_customer.product', 'order_status', 'customer')
            ->findOrFail($orderId);

        return view('admin.orders.edit', [
            'order' => $order,
        ]);
    }

    public function getOrderDetails($orderId)
    {
        $order = Order::with('order_details.product_customer.product', 'order_status', 'customer')
            ->findOrFail($orderId);

        return response()->json($order);
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function productDatatables($customerId)
    {
        if (request()->ajax()) {
            $productCustomer = ProductCustomer::with('product')->where('user_id', $customerId)->get();
            return DataTables::of($productCustomer)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-sm btn-primary chooseProduct" data-id="' . $row->id . '">
                    Pilih <i class="fa fa-check-circle">
                    </button>';
                })
                ->rawColumns(['action', 'path'])
                ->make(true);
        }
    }

    public function getProduct($productCustomerId)
    {
        $product = ProductCustomer::with('product')->findOrFail($productCustomerId);

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
                    'order_number' => 'ORD-' . date('Ymd') . '-' . time(),
                    'customer_id' => auth()->user()->id,
                    'estimate_date' => request('estimate_date'),
                    'description' => request('description'),
                    'total_price' => 0,
                ];

                $order = Order::create($data);

                // Create Order Status
                foreach (OrderStatusEnum::values() as $status) {
                    if ($status == OrderStatusEnum::PENDING) {
                        $order->order_status()->create([
                            'order_id' => $order->id,
                            'status' => $status,
                        ]);
                    } else {
                        $order->order_status()->insert([
                            'order_id' => $order->id,
                            'status' => $status,
                        ]);
                    }
                }

                // Add new order details
                $totalRequestItem = request('product_id');
                if ($totalRequestItem == null) {
                    throw new InvalidArgumentException('Barang tidak boleh kosong', 400);
                } else {
                    $totalPrice = 0;
                    for ($i = 0; $i < count($totalRequestItem); $i++) {

                        $product = ProductCustomer::where('user_id', $order->customer_id)
                            ->where('product_id', request('product_id')[$i])
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

    public function changeOrderStatus($orderId)
    {
        $order = Order::findOrFail($orderId);
        $currentOrderStatus = $order->status;
        $statuses = OrderStatusEnum::values();
        $currentIndex = array_search($currentOrderStatus, $statuses);

        if ($currentIndex !== false && isset($statuses[$currentIndex + 1])) {
            $nextStatus = $statuses[$currentIndex + 1];
        }

        $order->status = $nextStatus;
        $order->save();

        $order->order_status()->where('status', $nextStatus)->update([
            'created_at' => now(),
        ]);

        if (request('chooseValet')) {
            Pickup::create([
                'order_id' => $order->id,
                'user_id' => request('chooseValet'),
                'status' => 'pending',
                'date' => date('Y-m-d')
            ]);
        }
        return response()->json([
            'message' => 'Berhasil Mengubah Status Order',
        ]);
    }
}
