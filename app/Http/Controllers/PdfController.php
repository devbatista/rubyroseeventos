<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\Pessoa;
use PDF;

class PdfController extends Controller
{
    public function getPdf(Request $request, Agendamento $agendamento)
    {
        $data = $request->only('agendamento');
        $agendamento = $agendamento->getAgendamento($data['agendamento']);
        $pessoa = Pessoa::find($agendamento->pessoa)->first();

        $agendamento->data = date('d/m/Y', strtotime($agendamento->data_hora));
        $agendamento->hora = date('H:i', strtotime($agendamento->data_hora));
        
        $diaSemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'];
        $semana = date('w', strtotime($agendamento->data_hora));

        $agendamento->dia_semana = $diaSemana[$semana];
        $agendamento->hash = $pessoa->hash;

        $pdf = PDF::loadView('pdf', ['agendamento' => $agendamento]);

        return $pdf->setPaper('a4')->download('agendamento.pdf');
    }
}
