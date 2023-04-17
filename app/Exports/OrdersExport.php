<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection, WithMapping, WithHeadings
{

    public function __construct(
        protected $customerId,
        protected $paymentStatus,
        protected $month,
    ) {}

    public function headings(): array
    {
        return [
            'No Order',
            'Tanggal',
            'Customer',
            'Total',
        ];
    }

    public function map($order): array
    {
        return [
            $order->order_number,
            date('d-m-Y', strtotime($order->created_at)),
            $order->customer->name,
            $order->total_price,
        ];
    }

    public function collection()
    {
        $orders = Order::with('customer')
            ->orderBy('orders.created_at', 'desc')
            ->when(request('filterStatus'), function ($query, $status) {
                return $query->where('payment_status', $status);
            })
            ->when(request('filterCustomer'), function ($query, $customerId) {
                return $query->where('customer_id', $customerId);
            })
            ->when(request('filterMonth'), function ($query, $month) {
                $year = now()->year; // set tahun saat ini
                return $query->whereYear('orders.created_at', $year)
                    ->whereMonth('orders.created_at', $month);
            })
            ->get();

        return collect($orders);
    }
}
