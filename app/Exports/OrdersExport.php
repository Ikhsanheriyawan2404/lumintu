<?php

namespace App\Exports;

use App\Models\BridgeOrderProduct;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrdersExport implements
    FromCollection,
    WithHeadings,
    WithTitle,
    WithEvents,
    WithStyles
{
    private $orders;

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

    // public function map($orderDetail): array
    // {
    //     return [
    //         $orderDetail->order->order_number,
    //         date('d-m-Y', strtotime($orderDetail->order->created_at)),
    //         $orderDetail->product_customer->product->name,
    //         $orderDetail->product_customer->price,
    //         $orderDetail->qty,
    //         $orderDetail->product_customer->price * $orderDetail->qty,
    //     ];
    // }

    public function collection()
    {
        $this->orders = BridgeOrderProduct::select(
            'bridge_order_products.id',
            'bridge_order_products.order_id',
            'bridge_order_products.qty',
            'bridge_order_products.product_customer_id',
        )
            ->whereHas('order', function ($query) {
                $query->when($this->month != 'all', function ($query) {
                    return $query->whereMonth('created_at', $this->month);
                });
                $query->where('customer_id', $this->customer->id);
                $query->where('payment_status', 'paid');
                $query->orderBy('order_number', 'desc');
                $query->orderBy('created_at', 'desc');
            })
            ->with(['product_customer.product', 'order.customer'])
            ->get(['id', 'order_id', 'qty', 'product_customer_id']);

        $subtotals = $this->orders->map(function ($orderDetail) {
            return $orderDetail->product_customer->price * $orderDetail->qty;
        });

        $totalSubtotal = $subtotals->sum();

        $data = $this->orders->map(function ($orderDetail) {
            return [
                $orderDetail->order->order_number,
                date('d-m-Y', strtotime($orderDetail->order->created_at)),
                $orderDetail->product_customer->product->name,
                $orderDetail->product_customer->price,
                $orderDetail->qty,
                $orderDetail->product_customer->price * $orderDetail->qty,
            ];
        });

        $data->push([
            '',
            '',
            '',
            '',
            'Total',
            $totalSubtotal,
        ]);

        return collect($data->toArray());
    }

    public function title(): string
    {
        return $this->customer->name;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true]],
            $this->orders->count() + 2 => [
                'font' => ['bold' => true],
                'color' => ['argb' => '#FFFF00']
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle("A1:F" . $this->orders->count() + 2)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '#000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}
