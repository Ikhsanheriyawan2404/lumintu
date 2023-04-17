<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use InvalidArgumentException;
use App\DataTables\CostDataTable;
use App\Http\Requests\CostRequest;
use App\Models\MasterCost;
use Illuminate\Support\Facades\DB;

class CostController extends Controller
{
    public function index(CostDataTable $dataTable)
    {
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
                    Cost::find($itemId)->update($cost);

                } else {
                    $name = request('name');
                    for ($i = 0; $i < count($name); $i++) {
                        Cost::create([
                            'name' => $name[$i],
                            'price' => (int)str_replace(',', '', request('harga')[$i]),
                            'qty' => $cost['qty'][$i],
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
}
