<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use App\Models\PessoaMelu;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function enviaEmailRR(Request $request)
    {
        $emails = $request->only("emails");
        
        foreach ($emails['emails'] as $email) {
            $data = new Pessoa();
            $data = $data->getPessoasEnviaEmail($email);
            
            if($data) {
                $diaSemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'];
                $semana = date('w', strtotime($data->data_hora));
                $data->data_hora = $diaSemana[$semana];
    
                Mail::send(new \App\Mail\newCredenciamento($data));
                sleep(1);
            }
        }
    }

    public function enviaEmailMelu(Request $request)
    {
        $emails = $request->only("emails");
        
        foreach ($emails['emails'] as $email) {
            $data = new PessoaMelu();
            $data = $data->getPessoasEnviaEmail($email);
            
            if($data) {
                $diaSemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'];
                $semana = date('w', strtotime($data->data_hora));
                $data->data_hora = $diaSemana[$semana];
    
                Mail::send(new \App\Mail\newCredenciamento($data, true));
                sleep(1);
            }
        }
    }
}
