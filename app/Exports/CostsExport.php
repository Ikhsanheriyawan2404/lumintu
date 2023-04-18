<?php

namespace App\Exports;

use App\Models\Cost;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CostsExport implements
    FromCollection,
    WithHeadings,
    WithTitle
{
    public function __construct(
        protected $month,
        protected $header,
    ) {}

    public function headings(): array
    {
        return [
            $this->header,
        ];
    }

    public function collection()
    {
        $year = now()->year;
        $month = now()->month;
        $costs = Cost::selectRaw('DAY(date) as day, name, SUM(total) as total')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->groupBy('day', 'name')
            ->orderBy('day')
            ->get()
            ->toArray();

        // Membuat array yang berisi data tanggal dan kategori
        $data = [];
        $names = [];
        foreach ($costs as $cost) {

            $day = $cost['day'];
            $name = $cost['name'];
            $totalPrice = $cost['total'];

            if (!in_array($name, $names)) {
                $names[] = $name;
            }

            if (!isset($data[$day])) {
                $data[$day] = [];
            }

            $data[$day][$name] = $totalPrice;
        }

        $rows = [];
        foreach ($data as $day => $values) {
            $row = [$day];
            foreach ($names as $name) {
                $value = isset($values[$name]) ? $values[$name] : 0;
                $row[] = $value;
            }
            $rows[] = $row;
        }

        return collect(array_merge($rows));
    }

    public function title(): string
    {
        return $this->month;
    }
}
