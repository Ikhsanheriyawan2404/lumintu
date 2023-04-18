<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class OrdersMultipleSheet implements WithMultipleSheets
{
    public function __construct(
        protected $customerId,
        protected $paymentStatus,
        protected $month,
    ) {}

    public function sheets(): array
    {
        $sheets = [];
        $customers = User::role('hotel')->get();
        foreach ($customers as $customer) {
            $sheets[] = new OrdersExport($this->customerId, $this->paymentStatus, $this->month, $customer);
        }

        return $sheets;
    }
}
