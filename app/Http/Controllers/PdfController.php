<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use PDF;

class PdfController extends Controller
{
    public function getPdf(Request $request, Agendamento $agendamento)
    {
        $data = $request->only('agendamento');
        $agendamento = $agendamento->getAgendamento($data['agendamento']);

        $agendamento->data = date('d/m/Y', strtotime($agendamento->data_hora));
        $agendamento->hora = date('H:i', strtotime($agendamento->data_hora));
        
        $diaSemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'];
        $semana = date('w', strtotime($agendamento->data_hora));

        $agendamento->dia_semana = $diaSemana[$semana];

        $pdf = PDF::loadView('pdf', ['agendamento' => $agendamento]);

        return $pdf->setPaper('a4')->download('agendamento.pdf');
    }
}
