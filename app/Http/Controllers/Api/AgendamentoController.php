<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Agendamento;
use App\Models\Pessoa;

class AgendamentoController extends Controller
{
    public function index()
    {
        die('Requisição inválida');
    }

    public function create(Request $request)
    {
        $retorno = ['error' => null, 'list' => []];
        $data = $request->all();

        $validator = Validator::make($data, [
            'nome' => 'required|string|max:100',
            'dt_nascimento' => 'required|date_format:Y-m-d',
            'cpf' => 'required|max:15|cpf|unique:pessoas,cpf',
            'email' => 'required|string|max:100|email|unique:pessoas,email',
            'cidade' => 'required|string|max:100',
            'estado' => 'required|string|uf|max:2',
            'pais' => 'string|max:50|nullable',
            'telefone' => 'required|string|max:20',
            'whatsapp' => 'string|max:20|nullable',
            'instagram' => 'required|string|max:30',
            'data_agendamento' => 'required|date_format:Y-m-d',
            'hora_agendamento' => 'required|date_format:H:i'
        ]);

        if($validator->fails()) {
            $retorno['error'] = $validator->errors()->first();
            return $retorno;
        }

        $pessoa = $this->addPessoa($data, new Pessoa);
        $agendamento = $this->addAgendamento($data, $pessoa->id, new Agendamento);

        $retorno['list'] = $data;

        return $retorno;
    }

    public function getHorasInativas(Agendamento $agendamentos)
    {
        $agendamentos = $agendamentos->getHorasInativas();
        $datas = [
            '20-11-2021' => [],
            '21-11-2021' => [],
            '22-11-2021' => [],
            '23-11-2021' => []
        ];

        foreach($datas as $data => $array) {
            foreach($agendamentos as $agendamento) {
                if ($data == date('d-m-Y', strtotime($agendamento->data_hora))) {
                    $datas[$data][] = [
                        'total' => $agendamento->total, 
                        'horario' => date('H:i', strtotime($agendamento->data_hora)),
                        'status' => ($agendamento->total < 80) ? 'active' : 'inactive',
                    ];
                }
            }
        }
        
        return $datas;
    }

    private function addPessoa($data, Pessoa $pessoa)
    {
        $pessoa->nome = $data['nome'];
        $pessoa->dt_nascimento = $data['dt_nascimento'];
        $pessoa->cpf = $data['cpf'];
        $pessoa->email = $data['email'];
        $pessoa->cidade = $data['cidade'];
        $pessoa->estado = $data['estado'];
        $pessoa->pais = (isset($data['pais'])) ? $data['pais'] : null;
        $pessoa->telefone = $data['telefone'];
        $pessoa->whatsapp = (isset($data['whatsapp'])) ? $data['whatsapp'] : null;
        $pessoa->instagram = $data['instagram'];
        $pessoa->save();

        return $pessoa;
    }

    private function addAgendamento($data, $id, Agendamento $agendamento)
    {
        $dataHora = $data['data_agendamento'] . ' ' . $data['hora_agendamento'];

        $agendamento->pessoa = $id;
        $agendamento->data_hora = $dataHora;
        $agendamento->save();
        
        return $agendamento;
    }
}
