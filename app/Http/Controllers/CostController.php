<?php

namespace App\Http\Controllers;

use App\DataTables\CostDataTable;
use App\DataTables\ProductsDataTable;
use App\Http\Requests\CostRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Cost;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CostController extends Controller
{
    public function index(CostDataTable $dataTable)
    {
        return $dataTable->render('admin.cost.index');
    }

    /**
     * Validasi setiap request dan simpan ke dalam variabel $product.
     * Jika ada requset item_id maka update data, jika tidak maka buat data baru.
     */
    public function store(CostRequest $request)
    {
        try {
                DB::transaction(function () use ($request) {

                $cost = $request->validated();
                $price = (int)str_replace(',', '', $request->price);

                Cost::create(
                    [
                        'name' => $request->name,
                        'price' => $price,
                        'qty' => $request->qty,
                        'description' => $request->description,
                        'date' => now(),
                        'user_id' => auth()->user()->id,
                    ]
                    , $cost);

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
    public function edit($productId): \Illuminate\Http\JsonResponse
    {
        $cost = Cost::find($productId);
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
