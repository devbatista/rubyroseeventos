<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function getPdf(Request $request)
    {
        
        $data = [
            'nome' => 'Rafael Batista',
            'email' => 'batist11@gmail.com',
            'data_hora' => '2021-11-21 15:30',
            'cpf' => '399.328.998-60',
        ];

        $data['dia_semana'] = 'sabado';

        $pdf = PDF::loadView('pdf', ['data' => $data]);

        return $pdf->setPaper('a4')->stream();
    }
}
