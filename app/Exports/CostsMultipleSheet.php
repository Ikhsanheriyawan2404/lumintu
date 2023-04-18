<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CostsMultipleSheet implements WithMultipleSheets
{
    public function __construct(
        protected $header,
    ) {}

    public function sheets(): array
    {
        $sheets = [];
        for ($m = 1; $m <= 12; $m++) {
            $month = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
            $sheets[] = new CostsExport($month, $this->header);
        }

        return $sheets;
    }
}
