<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\ProductsDataTable;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductsDataTable $dataTable)
    {
        return $dataTable->render('products.index', [
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
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

    public function edit($productId)
    {
        $product = Product::find($productId);
        return response()->json($product);
    }


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
