<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;

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

    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class => function (AfterSheet $event) {
    //             $event->sheet->getStyle('C8:W25')->applyFromArray([
    //                 'borders' => [
    //                     'allBorders' => [
    //                         'borderStyle' => Border::BORDER_THIN,
    //                         'color' => ['argb' => 'FFFF0000'],
    //                     ],
    //                 ],
    //             ]);
    //         },
    //     ];
    // }
}
