<?php

namespace App\Exports;

use App\Models\Cost;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CostsExport implements
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
            'Customer',
            'Total',
        ];
    }

    public function map($cost): array
    {
        return [
            $cost->name,
            date('d-m-Y', strtotime($cost->created_at)),
            $cost->customer->name,
            $cost->total_price,
        ];
    }

    public function collection()
    {
        $costs = Cost::select(
            'costs.id',
            'costs.name',
            'costs.price',
            'costs.total',
            'costs.qty',
            'costs.date',
            'costs.created_at',
        )
            ->orderBy('costs.created_at', 'desc')
            ->get();

        return collect($costs);
    }

    public function title(): string
    {
        return $this->customer->name;
    }
}
