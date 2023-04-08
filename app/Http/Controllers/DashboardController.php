<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('hotel')) {
            return view('home', [
                'categories' => Category::all(),
                'orders' => Order::with('customer', 'order_details')->latest()->take(5)->get(),
            ]);
        } else {
            return view('admin.index', [
                'categories' => Category::all(),
                'orders' => Order::with('customer', 'order_details')->latest()->take(5)->get(),
            ]);
        }
    }

    public function summary()
    {
        return response()->json([
            'orders' => Order::count(),
            'customers' => User::role('hotel')->count(),
            'employees' => User::role('pegawai')->count(),
        ]);
    }

    public function chart()
    {
        $days = [];
        for ($i = 1; $i <= 31; $i++) {
            $days[] = str_pad($i, 2, '0', STR_PAD_LEFT);
        }

        $orders = [];
        foreach ($days as $value) {
            $order = Order::where(DB::raw("DATE_FORMAT(created_at, '%d')"), $value)
                ->whereYear('created_at', date('Y'))
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
}
