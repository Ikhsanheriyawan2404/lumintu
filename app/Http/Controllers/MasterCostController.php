<?php

namespace App\Http\Controllers;

use App\DataTables\MasterCostDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CostMasterRequest;
use App\Models\Category;
use App\Models\MasterCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterCostController extends Controller
{

    public function index(MasterCostDataTable $dataTable)
    {
        return $dataTable->render('admin.master_cost.index');
    }

    public function store(CostMasterRequest $request)
    {
        $itemId = request('item_id');

        try {
            DB::transaction(function () use ($itemId, $request) {

                $category = $request->validated();

                MasterCost::updateOrCreate(['id' => $itemId], $category);

            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data master pengeluaran berhasil disimpan',
        ]);
    }

    public function edit($categoryId)
    {
        $category = MasterCost::findOrFail($categoryId);
        return response()->json($category);
    }


    public function destroy($id)
    {
        try {
            $category = MasterCost::findOrFail($id);
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
