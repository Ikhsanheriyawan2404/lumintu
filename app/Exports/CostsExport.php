<?php

namespace App\Exports;

use App\Models\Cost;
use App\Models\MasterCost;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CostsExport implements
    FromCollection,
    WithHeadings,
    WithTitle,
    ShouldAutoSize,
    WithStyles,
    WithEvents
{

    public function __construct(
        protected $month,
        protected $header = ["Tanggal"],
    )
    {
        $categoryCost = MasterCost::orderBy('name', 'asc')->get(['name']);
        foreach ($categoryCost as $val) {
            $this->header[] = $val->name;
        }
    }

    public function headings(): array
    {
        return $this->header;
    }

    public function collection()
    {
        $year = now()->year;
        $month = $this->month['key'];
        $numDays = Carbon::create($year, $month)->daysInMonth;

        $days = array_map(function ($day) {
            return (int)$day;
        }, range(1, $numDays));

        $costs = Cost::selectRaw('DAY(created_at) as day, name, SUM(total) as total')
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->groupBy('day', 'name')
            ->orderBy('day')
            ->get()
            ->toArray();

        $result = collect($days)
            ->map(function ($day) use ($costs) {
                $filtered = array_filter($costs, function ($cost) use ($day) {
                    return $cost['day'] == $day;
                });
                return ['day' => $day] + array_reduce($filtered, function ($acc, $cost) {
                        return $acc + [$cost['name'] => $cost['total']];
                    }, []);
            })
            ->toArray();

        $rows = [];
        foreach ($result as $values) {
            $row = [$values['day']];
            foreach ($this->header as $name) {
                if ($name == 'Tanggal') {
                    continue;
                }
                $row[] = isset($values[$name]) ? $values[$name] : 0;
            }
            $rows[] = $row;
        }

        return collect(array_merge($rows));
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function title(): string
    {
        return $this->month['name'];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:W32')->applyFromArray([
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
