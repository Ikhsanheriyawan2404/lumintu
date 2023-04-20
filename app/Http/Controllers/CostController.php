<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\MasterCost;
use Illuminate\Http\Response;
use InvalidArgumentException;
use Barryvdh\DomPDF\Facade\Pdf;
use App\DataTables\CostDataTable;
use App\Http\Requests\CostRequest;
use Illuminate\Support\Facades\DB;
use App\Exports\CostsMultipleSheet;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class CostController extends Controller
{

    public function index(CostDataTable $dataTable)
    {

        $query = DB::table('costs')
            ->when(request('filterDate') && request('filterDate') !== 'today', function ($query) {
                    return $query->whereDay('created_at', '=', now());
                });
        return $dataTable->with([
            'query' => $query
        ])->render('admin.cost.index', [
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
        return Excel::download(new CostsMultipleSheet(), 'pengeluaran.xlsx');
    }

    public function exportPdf()
    {
        $data = Cost::all();
        $pdf = PDF::loadView('admin.report.cost.harian', ['data' => $data]);
        $pdfContent = $pdf->output();
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="invoice.pdf"',
            'Cache-Control'=> 'public, max-age=60'
        ];
        return new Response($pdfContent, 200, $headers);
    }
}
