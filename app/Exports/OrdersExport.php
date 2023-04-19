<?php

namespace App\Exports;

use App\Models\BridgeOrderProduct;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;

class OrdersExport implements
    FromCollection,
    WithMapping,
    WithHeadings,
    WithTitle
{
    public function __construct(
        protected $customerId,
        protected $paymentStatus,
        protected $month,
        protected $customer,
    ) {}

    public function headings(): array
    {
        return [
            'No Order',
            'Tanggal',
            'Nama Barang',
            'Harga',
            'Kuantiti',
            'Subtotal',
        ];
    }

    public function map($orderDetail): array
    {
        return [
            $orderDetail->order->order_number,
            date('d-m-Y', strtotime($orderDetail->order->created_at)),
            $orderDetail->product_customer->product->name,
            $orderDetail->product_customer->price,
            $orderDetail->qty,
            $orderDetail->product_customer->price * $orderDetail->qty,
        ];
    }

    public function collection()
    {
        $orders = BridgeOrderProduct::select(
            'bridge_order_products.id',
            'bridge_order_products.order_id',
            'bridge_order_products.qty',
            'bridge_order_products.product_customer_id',
        )
            ->whereHas('order', function ($query) {
                $query->where('customer_id', $this->customer->id);
                $query->where('payment_status', 'paid');
                $query->orderBy('order_number', 'desc');
                $query->orderBy('created_at', 'desc');
            })
            ->with(['product_customer.product', 'order.customer'])
            ->get();

        return collect($orders);
    }

    public function title(): string
    {
        return $this->customer->name;
    }
}
