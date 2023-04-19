<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use InvalidArgumentException;
use Yajra\DataTables\Facades\DataTables;

class PaymentController extends Controller
{
    public function datatables($orderId)
    {
        if (request()->ajax()) {
            $company = Payment::where('order_id', $orderId)->get();
            return DataTables::of($company)
                ->addIndexColumn()
                ->editColumn('path', function ($row) {
                    return '
                        <img class="img-fluid" src="'.$row->takeImage.'">
                    ';
                })
                ->rawColumns(['action', 'path'])
                ->make(true);
        }
    }

    public function uploadPayment()
    {
        request()->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:1048',
        ]);

        try {
            Payment::create([
                'order_id' => request('order_id'),
                'user_id' => auth()->user()->id,
                'image' => request()->file('image')->store('payments')
            ]);
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Bukti Pembayaran berhasil disimpan',
        ]);
    }

    public function approvePayment(Order $order)
    {
        $order->update([
            'payment_status' => 'paid'
        ]);

        return redirect()->back();
    }

    public function cancelPayment(Order $order)
    {
        $order->update([
            'payment_status' => 'unpaid'
        ]);

        return redirect()->back();
    }
}
