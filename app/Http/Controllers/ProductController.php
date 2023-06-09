<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use InvalidArgumentException;
use App\Models\ProductCustomer;
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
        return $dataTable->render('admin.products.index', [
            'categories' => Category::get()
        ]);
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

                $product = Product::updateOrCreate(['id' => $itemId], $product);

                // Jika tambah barang maka otomatis tambahkan ke semua hotel
                if (! $itemId) {
                    $users = User::role('hotel')->get(['id']);
                    foreach ($users as $user) {
                        ProductCustomer::create([
                            'user_id' => $user->id,
                            'product_id' => $product->id,
                            'price' => $product->price,
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
