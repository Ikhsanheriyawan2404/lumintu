<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class CostsMultipleSheet implements
    WithMultipleSheets,
    WithStyles,
    ShouldAutoSize,
    WithColumnWidths,
    WithEvents
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
            1 => ['font' => ['bold' => true]]
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 45,
            'B' => 45,
        ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('C8:W25')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => 'FFFF0000'],
                        ],
                    ],
                ]);
            },
        ];
    }

}
