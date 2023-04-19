<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CostsMultipleSheet implements WithMultipleSheets
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
}
