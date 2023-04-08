<?php

namespace App\Http\Controllers;

use App\DataTables\ProductsDataTable;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CostController extends Controller
{
    public function index(ProductsDataTable $dataTable)
    {
        return $dataTable->render('Cost.index');
    }

    /**
     * Validasi setiap request dan simpan ke dalam variabel $product.
     * Jika ada requset item_id maka update data, jika tidak maka buat data baru.
     */
    public function store(ProductRequest $request)
    {
        $itemId = request('item_id');

        try {
            DB::transaction(function () use ($itemId, $request) {

                $product = $request->validated();

                Product::updateOrCreate(['id' => $itemId], $product);

            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data barang berhasil disimpan',
        ]);
    }

    /**
     * Return berupa json barang untuk ditampilkan datanya di dalam modal .
     */
    public function edit($productId): \Illuminate\Http\JsonResponse
    {
        $product = Product::find($productId);
        return response()->json($product);
    }

    /**
     * Hapus barang berdasarkan id.
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Barang berhasil dihapus',
        ]);
    }
}
