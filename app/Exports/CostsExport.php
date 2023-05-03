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
    private $alphabet;

    public function __construct(
        protected $month,
        protected $header = ["Tanggal"],
    )
    {
        $categoryCost = MasterCost::orderBy('name', 'asc')->get(['name']);
        foreach ($categoryCost as $val) {
            $this->header[] = $val->name;
        }
        $this->header[] = 'Total';
        $this->alphabet = range('A', 'Z');
    }

    public function headings(): array
    {
        return $this->header;
    }

    public function collection()
    {
        // Pilih tahun ini
        $year = now()->year;
        // Pilih bulan berdasarkan sheet
        $month = $this->month['key'];
        // Pilih jumlah hari pada bulan terpilih
        $numDays = Carbon::create($year, $month)->daysInMonth;

        // Buat array dari 1 sampai jumlah hari
        $days = array_map(function ($day) {
            return (int)$day;
        }, range(1, $numDays));

        // Ambil data cost berdasarkan bulan dan tahun
        $costs = Cost::selectRaw('DAY(created_at) as day, name, SUM(total) as total')
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->groupBy('day', 'name')
            ->orderBy('day')
            ->get()
            ->toArray();

        // mapping data cost berdasarkan hari
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

        // Buat array dari data cost
        $rows = [];
        $totals = array_fill(0, count($this->header), 0);
        foreach ($result as $values) {
            $row = [$values['day']];
            $dailyTotal = 0; // inisialisasi variabel untuk menyimpan total nominal per hari
            foreach ($this->header as $index => $name) {
                if ($name == 'Tanggal') {
                    continue;
                }

                if ($name == 'Total') {
                    continue;
                }

                $value = isset($values[$name]) ? $values[$name] : 0;
                $totals[$index] += $value;
                $row[] = $value;
                $dailyTotal += $value; // tambahkan nilai cost ke variabel dailyTotal
            }
            $row[] = $dailyTotal; // tambahkan nilai total nominal per hari ke dalam array $row
            $totals[count($this->header)-1] += $dailyTotal; // tambahkan nilai total nominal per hari ke dalam array $totals
            $rows[] = $row;
        }

        // Tambahkan kolom total per kategori/nama pada baris terakhir
        $totals[0] = 'Total';
        $rows[] = $totals;

        // Return data cost
        return collect(array_merge($rows));
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true]],
            count($this->collection()) + 1 => ['font' => ['bold' => true]],
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
                $event->sheet->getStyle(
                    'A1:' . $this->alphabet[count($this->header) - 1] . count($this->collection()) + 1
                )
                ->applyFromArray([
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
