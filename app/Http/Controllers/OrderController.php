<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Pickup;
use App\Models\Delivery;
use App\Models\OrderStatus;
use InvalidArgumentException;
use App\Exports\OrdersExport;
use App\Enums\OrderStatusEnum;
use App\Mail\OrderNotification;
use App\Models\ProductCustomer;
use App\DataTables\OrderDataTable;
use App\Models\BridgeOrderProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\OrderStatusNotif;
use App\Http\Requests\OrderStoreRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    // Data order berdasarkan user login
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
        $order = Order::with('order_details.product_customer.product', 'order_status', 'customer', 'pickups.valet', 'deliveries.valet')
            ->findOrFail($orderId);

        $currentOrderStatus = $order->status;
        $statuses = OrderStatusEnum::values();
        $currentIndex = array_search($currentOrderStatus, $statuses);

        if ($currentIndex !== false && isset($statuses[$currentIndex + 1])) {
            $nextStatus = $statuses[$currentIndex + 1];
        }

        return view('admin.orders.show', [
            'order' => $order,
            'order_statuses' => OrderStatus::where('order_id', $orderId)->get(),
            'valet' => User::role('valet')->get(),
            'nextStatus' => $nextStatus ?? null,
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

    // Halaman acc order dari valet
    public function accOrder($orderId)
    {
        $order = Order::with('order_details.product_customer.product', 'order_status', 'customer')
            ->findOrFail($orderId);

        return view('admin.orders.acc-order', [
            'order' => $order,
        ]);
    }

    // Halaman detail order
    public function getOrderDetails($orderId)
    {
        $order = Order::with('order_details.product_customer.product', 'order_status', 'customer')
            ->findOrFail($orderId);

        return response()->json($order);
    }

    // Halaman create order dari user hotel
    public function create()
    {
        return view('admin.orders.create', [
            'customers' => User::role('hotel')->get(),
        ]);
    }

    /**
     * list barang dari setiap customer/user hotel berdasarkan user id
     * data dibutuhkan untuk menampilkan list barang yang bisa dipilih pada modal
     */
    public function listProductDatatables($customerId)
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

    // POST membuat order
    public function store(OrderStoreRequest $request)
    {
        try {

            $request->validated();

            DB::transaction(function () {

                $data = [
                    'order_number' => 'ORD-' . date('Ymd') . '-' . time(),
                    'customer_id' => request('customer') ?? auth()->user()->id,
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


                // Send Email OrderCreated And Norificacation Via database
                $order = Order::with('order_status')->find($order->id);
                $listUsersWhoGetNotifications = [];
                foreach (User::whereHas('roles', function ($q) {
                        $q->where('name', 'superadmin');
                        $q->orWhere('name', 'admin');
                    })->get() as $user) {
                    $listUsersWhoGetNotifications[] = $user;
                }

                $listUsersWhoGetNotifications[] = User::find($order->customer_id);

                $users = collect($listUsersWhoGetNotifications);

                Notification::send($users, new OrderStatusNotif($order));
                Mail::to('sutio.mudiarno@gmail.com')->queue(new OrderNotification($order));
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

    // Merubah order status by admin
    public function changeOrderStatus($orderId)
    {
        try {

            DB::transaction(function () use ($orderId) {

                $order = Order::with('order_status')->findOrFail($orderId);
                $currentOrderStatus = $order->status;
                $statuses = OrderStatusEnum::values();
                $currentIndex = array_search($currentOrderStatus, $statuses);

                if ($currentIndex !== false && isset($statuses[$currentIndex + 1])) {
                    $nextOrderStatus = $statuses[$currentIndex + 1];
                }

                $order->status = $nextOrderStatus;
                $order->save();

                $order->order_status()->where('status', $nextOrderStatus)->update([
                    'created_at' => now(),
                ]);

                $listUsersWhoGetNotifications = [];
                foreach (User::whereHas('roles', function ($q) {
                        $q->where('name', 'superadmin');
                        $q->orWhere('name', 'admin');
                    })->get() as $user) {
                    $listUsersWhoGetNotifications[] = $user;
                }

                $listUsersWhoGetNotifications[] = User::find($order->customer_id);

                if (request('chooseValet')) {
                    if ($nextOrderStatus == OrderStatusEnum::APPROVE) {

                        Pickup::create([
                            'order_id' => $order->id,
                            'user_id' => request('chooseValet'),
                            'status' => 'undone',
                            'date' => date('Y-m-d')
                        ]);
                    } elseif ($nextOrderStatus == OrderStatusEnum::DELIVERY) {

                        Delivery::create([
                            'order_id' => $order->id,
                            'user_id' => request('chooseValet'),
                            'status' => 'undone',
                            'date' => date('Y-m-d')
                        ]);
                    }
                    $listUsersWhoGetNotifications[] = User::find(request('chooseValet'));
                    Mail::to(User::find(request('chooseValet'))->email)->queue(new OrderNotification($order));
                }

                $order = Order::with('order_status')->find($order->id);
                $users = collect($listUsersWhoGetNotifications);
                Notification::send($users, new OrderStatusNotif($order));
                Mail::to(request($order->customer_id))->queue(new OrderNotification($order));
            });
        } catch (\InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], $e->getCode());
        }

        return response()->json([
            'message' => 'Berhasil Mengubah Status Order',
        ]);
    }

    // Cek order/Update order by Valet
    public function accOrderByValet(OrderStoreRequest $request, $orderId)
    {
        try {

            $request->validated();

            DB::transaction(function () use ($orderId) {

                $order = Order::findOrFail($orderId);

                $order->update([
                    'status' => OrderStatusEnum::PICKUP,
                ]);

                // Change Order Status
                OrderStatus::where('order_id', $order->id)
                    ->where('status', OrderStatusEnum::PICKUP)
                    ->update([
                        'created_at' => now(),
                    ]);

                // Add new order details
                $totalRequestItem = request('product_id');
                if ($totalRequestItem == null) {
                    throw new InvalidArgumentException('Barang tidak boleh kosong', 400);
                } else {
                    $totalPrice = 0;
                    $order->order_details()->delete();
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

                $order = Order::with('order_status')->find($order->id);
                $listUsersWhoGetNotifications = [];
                foreach (User::whereHas('roles', function ($q) {
                        $q->where('name', 'superadmin');
                        $q->orWhere('name', 'admin');
                    })->get() as $user) {
                    $listUsersWhoGetNotifications[] = $user;
                }

                $listUsersWhoGetNotifications[] = User::find($order->customer_id);

                $users = collect($listUsersWhoGetNotifications);

                Notification::send($users, new OrderStatusNotif($order));
                Mail::to($order->customer->email)->queue(new OrderNotification($order));
            });

        } catch (InvalidArgumentException $e) {

            return response()->json([
                'message' => $e->getMessage(),
            ], $e->getCode());
        }

        return response()->json([
            'message' => 'Berhasil Mengubah Order',
        ]);
    }


    // Json response list input product
    public function getProductToPutOnListOrderTable($productCustomerId)
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

    // Json response list input product with the data
    public function getProductEdit($orderId)
    {
        $orderDetails = BridgeOrderProduct::with('product_customer.product')->where('order_id', $orderId)->get();

        $data = [];
        foreach ($orderDetails as $product) {
            $row = [];

            $row[] = '<input name="product_id[]" type="hidden" value="' . $product->product_customer_id . '" class="form-control">' . $product->product_customer->product->name;

            $row[] = '<input type="text" name="price[]" data-id="' . $product->product_customer_id . '" class="form-control price" value="' . number_format($product->product_customer->price, 0, ',', '.') . '" disabled>';

            $row[] = '<input type="number" name="qty[]" data-id="' . $product->product_customer_id . '" class="form-control qty" value="'.$product->qty.'">';

            $row[] = '<input type="text" name="subtotal[]" class="form-control subtotal" data-id="' . $product->product_customer_id . '" value="'.number_format($product->qty * $product->product_customer->price, 0, ',', '.').'" disabled>';

            $row[] = '<a class="btn btn-sm btn-outline-danger btn-icon removeProduct"><em class="fa fa-trash"></em></a>';
            $data[] = $row;
        }

        return response()->json($data);
    }

    public function exportExcel()
    {
        return Excel::download(new OrdersExport, date('Ymd-His') . 'orders.xlsx');
    }
}
