<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class TestController extends Controller
{
    public function test()
    {
        $pdf = Pdf::loadView('admin.report.cost.harian')->setPaper('a4', 'portrait');
        return $pdf->download('kontol.pdf');
    }
}
