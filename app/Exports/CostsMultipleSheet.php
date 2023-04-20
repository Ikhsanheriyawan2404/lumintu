<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class CostsMultipleSheet implements
    WithMultipleSheets,
    WithStyles,
    ShouldAutoSize
{
    public function sheets(): array
    {
        $sheets = [];
        for ($m = 1; $m <= 12; $m++) {
            $month = [
                'key' => $m,
                'name' => date('F', mktime(0, 0, 0, $m, 1, date('Y')))
            ];
            $months[] = $month;
            $sheets[] = new CostsExport($month);
        }

        return $sheets;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]]
        ];
    }
}
