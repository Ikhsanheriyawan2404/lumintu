<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\CategoryDataTable;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('categories.index');
    }

    public function store(CategoryRequest $request)
    {
        $itemId = request('item_id');

        try {
            DB::transaction(function () use ($itemId, $request) {

                $category = $request->validated();

                Category::updateOrCreate(['id' => $itemId], $category);

            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data Jenis barang berhasil disimpan',
        ]);
    }

    public function edit($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return response()->json($category);
    }


    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Jenis barang berhasil dihapus',
        ]);
    }
}
