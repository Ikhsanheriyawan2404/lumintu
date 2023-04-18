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
        $orders = Order::select(
            'orders.id',
            'orders.customer_id',
            'orders.total_price',
            'orders.order_number',
            'orders.payment_status',
            'orders.status',
            'orders.created_at',
        )
            ->orderBy('orders.created_at', 'desc')
            ->when(request('filterStatus') && request('filterStatus') !== 'all', function ($query) {
                return $query->where('payment_status', request('filterStatus'));
            })
            ->when(request('filterCustomer') && request('filterCustomer') !== 'all', function ($query) {
                return $query->where('customer_id', request('filterCustomer'));
            })
            ->when(request('filterMonth') && request('filterMonth') !== 'all', function ($query) {
                $year = now()->year; // set tahun saat ini
                return $query->whereYear('created_at', $year)
                    ->whereMonth('created_at', request('filterMonth'));
            })
            ->with('customer')->get();

        return collect($orders);
    }
}
