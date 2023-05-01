<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;


class TestController extends Controller
{
    public function test()
    {
        $pdf = Pdf::loadView('admin.orders.invoice.print_invoice');
        return $pdf->stream();
    }
}
