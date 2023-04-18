<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\Order;
use App\Models\MasterCost;
use InvalidArgumentException;
use App\DataTables\CostDataTable;
use App\Http\Requests\CostRequest;
use Illuminate\Support\Facades\DB;
use App\Exports\CostsMultipleSheet;
use Maatwebsite\Excel\Facades\Excel;

class CostController extends Controller
{
    public function index(CostDataTable $dataTable)
    {
        $orders = Order::select(
            'orders.id',
            'orders.customer_id',
            'orders.total_price',
            'orders.order_number',
            'orders.payment_status',
            'orders.status',
            'orders.created_at',
        )
            ->orderBy('orders.created_at', 'desc')
            ->with('customer')->get();

        // return response()->json(collect($orders));

        $months = [];

        for ($m = 1; $m <= 12; $m++) {
            $month = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
            // return response()->json($month);
            $months[] = $month;
        }
        // return response()->json($months);
        $year = now()->year;
        $month = now()->month;
        $costs = Cost::selectRaw('DAY(date) as day, name, SUM(total) as total')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->groupBy('day', 'name')
            ->orderBy('day')
            ->get()
            ->toArray();

        // return response()->json($costs);

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

        // return response()->json($data);

        // Membuat header tabel
        $header = ['Tanggal'];
        foreach ($names as $name) {
            $header[] = $name;
        }

        // Mengisi data ke dalam tabel
        $rows = [];
        foreach ($data as $day => $values) {
            $row = [$day];
            foreach ($names as $name) {
                $value = isset($values[$name]) ? $values[$name] : 0;
                $row[] = $value;
            }
            $rows[] = $row;
        }

        // return response()->json($rows);

        // Menggabungkan header dan data
        $tableData = array_merge($rows);


        // return response()->json(collect($tableData));

        return $dataTable->render('admin.cost.index', [
            'master_cost' => MasterCost::get(['name']),
        ]);
    }

    /**
     * Validasi setiap request dan simpan ke dalam variabel $product.
     * Jika ada requset item_id maka update data, jika tidak maka buat data baru.
     */
    public function store(CostRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $itemId = request('item_id');
                $cost = $request->validated();
                $cost['user_id'] = auth()->user()->id;

                if ($itemId) {

                    $cost['harga'] = (int)str_replace(',', '', request('harga'));
                    $cost['total'] = $cost['harga'] * $cost['qty'];
                    Cost::find($itemId)->update($cost);

                } else {
                    $name = request('name');
                    for ($i = 0; $i < count($name); $i++) {
                        $price = (int)str_replace(',', '', request('harga')[$i]);
                        Cost::create([
                            'name' => $name[$i],
                            'price' => $price,
                            'qty' => $cost['qty'][$i],
                            'total' => $price * $cost['qty'][$i],
                            'description' => $cost['description'][$i],
                            'date' => now(),
                            'user_id' => auth()->user()->id,
                        ]);
                    }
                }
            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Pengeluaran berhasil disimpan',
        ]);
    }

    /**
     * Return berupa json barang untuk ditampilkan datanya di dalam modal .
     */
    public function edit($costId): \Illuminate\Http\JsonResponse
    {
        $cost = Cost::find($costId);
        return response()->json($cost);
    }

    /**
     * Hapus barang berdasarkan id.
     */
    public function destroy($id)
    {
        try {
            $product = Cost::findOrFail($id);
            $product->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Pengeluran berhasil dihapus',
        ]);
    }

    public function exportExcel()
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

        $months = [];

        for ($m = 1; $m <= 12; $m++) {
            $month = [
                'key' => $m,
                'name' => date('F', mktime(0, 0, 0, $m, 1, date('Y')))
            ];
            $months[] = $month;
        }

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

        // Membuat header tabel
        $header = ['Tanggal'];
        foreach ($names as $name) {
            $header[] = $name;
        }


        return Excel::download(new CostsMultipleSheet($header), 'pengeluaran.xlsx');
    }
}
