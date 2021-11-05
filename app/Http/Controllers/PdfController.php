<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function getPdf()
    {
        $pdf = PDF::loadView('pdf', ['salve' => 'salve']);

        return $pdf->setPaper('a4')->stream();
    }
}
