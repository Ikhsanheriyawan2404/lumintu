<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\Cost;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('hotel')) {
            return view('admin.dashboard', [
                'categories' => Category::all(),
                'orders' => Order::with('customer', 'order_details')->where('customer_id', '=', auth()->user()->id)->latest()->take(5)->get(),
            ]);
        } else {
            return view('admin.dashboard', [
                'categories' => Category::all(),
                'orders' => Order::with('customer', 'order_details')->latest()->take(5)->get(),
            ]);
        }
    }

    public function summary()
    {
        if (auth()->user()->hasRole('hotel')) {
            return response()->json([
                'orders' => Order::where('customer_id', '=', auth()->user()->id)->count(),
                'customers' => User::role('hotel')->count(),
                'employees' => User::role('pegawai')->count(),
                ]);
        } else {
            return response()->json([
                'orders' => Order::count(),
                'costs' => number_format(Cost::sum('total')),
                'customers' => User::role('hotel')->count(),
                'employees' => User::role('pegawai')->count(),
            ]);
        }
    }

    public function chartOrder()
    {
        $days = [];
        for ($i = 1; $i <= 31; $i++) {
            $days[] = str_pad($i, 2, '0', STR_PAD_LEFT);
        }

        $orders = [];
        foreach ($days as $value) {
            $order = Order::where(DB::raw("DATE_FORMAT(created_at, '%d')"), $value)
                ->whereYear('created_at', date('Y'))
                ->where('payment_status', 'paid')
                ->get([
                    'total_price',
                    'created_at'
                ]);

            $orders[] = $order->sum('total_price');
        }

        return response()->json([
            'labels' => $days,
            'orders' => $orders,
        ]);
    }

    public function customerOrdered()
    {
        $products = Order::with('customer')
            ->select('customer_id', DB::raw('SUM(total_price) as total_price'))
            ->where('payment_status', 'paid')
            ->groupBy('customer_id')
            ->orderBy('total_price', 'desc')
            ->take(5)
            ->get();

        $productNames = [];
        $productQuantities = [];
        foreach ($products as $value) {
            $productNames[] = $value->customer->name;
            $productQuantities[] = $value->total_price;
        }

        return response()->json([
            'productNames' => $productNames,
            'productQuantities' => $productQuantities,
        ]);
    }
}
