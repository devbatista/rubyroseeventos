<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Agendamento;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Mail;

class CredenciamentoController extends Controller
{
    public $mailer;

    public function index()
    {
        die('Requisição inválida');
    }

    public function create(Request $request)
    {
        $retorno = ['error' => null, 'list' => []];
        $data = $request->all();

        $horarios = $this->getHorasInativas(new Agendamento());
        $data_hora = explode(' ', $data['data_hora']);

        foreach ($horarios as $dia => $horario) {
            if ($data_hora[0] == $dia) {
                foreach ($horario as $hora) {
                    if ($data_hora[1] == $hora['horario']) {
                        if($hora['total'] >= 80) {
                            $retorno['error'] = 'O horário escolhido atingiu o limite de agendamento. Por favor, escolha outro :)';
                            return $retorno;
                        }
                    }
                }
            }
        }

        $validator = Validator::make($data, [
            'nome' => 'required|string|max:100',
            'dt_nascimento' => 'required|date_format:d-m-Y',
            'cpf' => 'required|max:15|cpf|unique:pessoas,cpf',
            'email' => 'required|string|max:100|email|unique:pessoas,email',
            'cidade' => 'required|string|max:100',
            'estado' => 'required|string|uf|max:2',
            'pais' => 'string|max:50|nullable',
            'telefone' => 'required|string|max:20',
            'whatsapp' => 'string|max:20|nullable',
            'instagram' => 'nullable|string|max:30',
            'data_hora' => 'required|date_format:d-m-Y H:i',
            'confirmacao' => 'required',
        ]);

        if ($validator->fails()) {
            $retorno['error'] = $validator->errors()->first();
            return $retorno;
        }

        $data['dt_nascimento'] = date('Y-m-d', strtotime($data['dt_nascimento']));
        $data['data_hora'] = date('Y-m-d H:i', strtotime($data['data_hora']));

        if ($data['data_hora'] < date('Y', strtotime('2022'))) {
            $retorno['error'] = 'Erro ao salvar os dados, limpe cookies e cache do seu navegador e tente novamente';
            return $retorno;
        }

        $pessoa = $this->addPessoa($data, new Pessoa);
        $agendamento = $this->addAgendamento($data, $pessoa->id, new Agendamento);

        if (!$agendamento) {
            $retorno['error'] = 'Agendamento não concluído, atualize a página e tente novamente';
            return $retorno;
        }

        $data['agendamento'] = $agendamento;

        $this->enviaEmail($data);

        $retorno['list'] = $data;

        return $retorno;
    }

    public function getHorasInativas(Agendamento $agendamentos)
    {
        $agendamentos = $agendamentos->getHorasInativas();
        $datas = [
            '03-09-2022' => [],
            '04-09-2022' => [],
            '05-09-2022' => [],
            '06-09-2022' => []
        ];

        foreach ($datas as $data => $array) {
            foreach ($agendamentos as $agendamento) {
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

    public function getAgendamentos(Request $request)
    {
        $data = $request->only('type', 'admin');
        
        if(!$data) {
            die('Requisição inválida');
        }

        $validTypes = ['data', 'total'];
        $validEmails = ['thzago@outlook.com', 'batist11@gmail.com'];

        if(!in_array($data['type'], $validTypes) || !in_array($data['admin'], $validEmails)) {
            die('Requisição inválida 2');
        }

        switch ($data['type']) {
            case 'data':
                $dados = $this->getAgendamentosByData();
                break;

            case 'total':
                $dados = Agendamento::count();
                break;
        }

        return $dados;
    }

    private function getAgendamentosByData()
    {
        $agendamentos = Agendamento::get();
        $datas = [
            '03-09-2022' => [],
            '04-09-2022' => [],
            '05-09-2022' => [],
            '06-09-2022' => []
        ];

        foreach ($datas as $data => $array) {
            $count = 0;
            foreach ($agendamentos as $agendamento) {
                if ($data == date('d-m-Y', strtotime($agendamento->data_hora))) {
                    $count++;
                    $datas[$data] = $count;
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
        $agendamento->pessoa = $id;
        $agendamento->data_hora = $data['data_hora'];
        $agendamento->save();

        return $agendamento->id;
    }

    private function enviaEmail($data)
    {
        $diaSemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'];
        $semana = date('w', strtotime($data['data_hora']));

        $data['dia_semana'] = $diaSemana[$semana];

        Mail::send(new \App\Mail\newCredenciamento($data));
    }
}
