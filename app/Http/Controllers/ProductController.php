<?php

namespace App\Http\Controllers;

use App\Models\Product;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\ProductsDataTable;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(ProductsDataTable $dataTable)
    {
        return $dataTable->render('products.index');
    }

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
}
