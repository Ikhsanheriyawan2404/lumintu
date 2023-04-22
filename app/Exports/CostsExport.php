<?php

namespace App\Exports;

use App\Models\Cost;
use App\Models\MasterCost;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CostsExport implements
    FromCollection,
    WithHeadings,
    WithTitle
{
    public function __construct(
        protected $month,
        protected $header = ["Tanggal"],
    ) {
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
        $numDays = \Carbon\Carbon::create($year, $month)->daysInMonth;

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

    public function title(): string
    {
        return $this->month['name'];
    }
}
