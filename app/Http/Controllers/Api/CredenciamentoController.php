<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Agendamento;
use App\Models\Pessoa;
use App\Models\AgendamentoMelu;
use App\Models\PessoaMelu;
use BaconQrCode\Encoder\QrCode as EncoderQrCode;
use Illuminate\Support\Facades\Mail;
// use SimpleSoftwareIO\QrCode\Facades\QrCode;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;

class CredenciamentoController extends Controller
{
    public $mailer;

    public function index(Request $request)
    {
        die('Requisição inválida');
        // $data = 'https://instagram.com/';
        // return '<img src="'.(new QRCode)->render($data).'">';
        // return $this->generateQrCode('ruby-rose', 'hasuhasuhsauhsa');
    }

    public function createMelu(Request $request)
    {
        return $this->create($request, true);
    }

    public function create(Request $request, $melu = false)
    {
        $retorno = ['error' => null, 'list' => []];
        $data = $request->all();

        $horarios = $this->getHorasInativas($melu);
        $data_hora = explode(' ', $data['data_hora']);

        foreach ($horarios as $dia => $horario) {
            $limite = ($dia == "09-09-2023") ? 27 : 20;
            if ($data_hora[0] == $dia) {
                foreach ($horario as $hora) {
                    if ($data_hora[1] == $hora['horario']) {
                        if($hora['total'] >= $limite) {
                            $retorno['error'] = 'O horário escolhido atingiu o limite de agendamento. Por favor, escolha outro :)';
                            return $retorno;
                        }
                    }
                }
            }
        }
        $table = ($melu) ? '_melu' : '';

        $validator = Validator::make($data, [
            'nome' => 'required|string|max:100',
            'dt_nascimento' => 'required|date_format:d-m-Y',
            'cpf' => 'required|max:15|cpf|unique:pessoas'.$table.',cpf',
            'email' => 'required|string|max:100|email|unique:pessoas'.$table.',email',
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

        $datas_validas = [
            '2023-09-09',
            '2023-09-10',
            '2023-09-11',
            '2023-09-12',
        ];

        $data['dt_nascimento'] = date('Y-m-d', strtotime($data['dt_nascimento']));
        $data['data_hora'] = date('Y-m-d H:i', strtotime($data['data_hora']));
        $data_escolhida = date('Y-m-d', strtotime($data['data_hora']));

        if ((!in_array($data_escolhida, $datas_validas))) {
            $retorno['error'] = 'Requisição inválida, limpe o cache de navegação em seguida atualize a página, e tente novamente!';
            return $retorno;
        }

        $data['hash'] = md5(time());
        $agendamento_rr = false;
        $agendamento_melu = false;

        if (!$melu) {
            $pessoa = $this->addPessoa($data, new Pessoa);
            $agendamento_rr = $this->addAgendamento($data, $pessoa->id, new Agendamento);
            $agendamento_melu = $agendamento_rr ? true : false;
        } else {
            $pessoa_melu = $this->addPessoaMelu($data, new PessoaMelu);
            $agendamento_melu = $this->addAgendamentoMelu($data, $pessoa_melu->id, new AgendamentoMelu);
            $agendamento_rr = $agendamento_melu ? true : false;
        }

        if (!$agendamento_rr || !$agendamento_melu) {
            $retorno['error'] = 'Agendamento não concluído, atualize a página e tente novamente';
            return $retorno;
        }

        $data['agendamento'] = (!is_bool($agendamento_rr)) ? $agendamento_rr : $agendamento_melu;

        $evento = $melu ? 'melu' : 'ruby-rose';
        $id = $data['agendamento'];
        $this->generateQrCode($data['hash'], $evento);

        $this->enviaEmail($data, $melu);

        $retorno['list'] = $data;

        return $retorno;
    }

    public function getHorasInativasMelu()
    {
        return $this->getHorasInativas(true);
    }

    public function getHorasInativas($melu = false)
    {
        $agendamentos = (!$melu) ? new Agendamento() : new AgendamentoMelu();
        $agendamentos = $agendamentos->getHorasInativas();
        $datas = [
            '09-09-2023' => [],
            '10-09-2023' => [],
            '11-09-2023' => [],
            '12-09-2023' => []
        ];

        foreach ($datas as $data => $array) {
            $limite = ($data == "09-09-2023") ? 27 : 20;
            foreach ($agendamentos as $agendamento) {
                if ($data == date('d-m-Y', strtotime($agendamento->data_hora))) {
                    $datas[$data][] = [
                        'total' => $agendamento->total,
                        'horario' => date('H:i', strtotime($agendamento->data_hora)),
                        'status' => ($agendamento->total < $limite) ? 'active' : 'inactive',
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

    public function getVagasDisponiveis() {
        $cadastros = Agendamento::count();
        $total = ((24*3) * 20) + (18 * 27);
        $disponiveis = $total - $cadastros;
        $disponiveis = ($disponiveis > 0) ? $total - $cadastros : 0;

        $dados = [
            'cadastros' => $cadastros,
            'total de vagas' => $total,
            'disponiveis' => $disponiveis,
        ];

        return $dados;
    }

    public function getVagasDisponiveisMelu() {
        $cadastros = AgendamentoMelu::count();
        $total = ((24*3) * 20) + (18 * 27);
        $disponiveis = $total - $cadastros;
        $disponiveis = ($disponiveis > 0) ? $total - $cadastros : 0;

        $dados = [
            'cadastros' => $cadastros,
            'total de vagas' => $total,
            'disponiveis' => $disponiveis,
        ];

        return $dados;
    }

    public function validateRubyRoseQrCode($hash) 
    {
        $retorno = ['error' => null, 'list' => []];
        $qrcode = $this->validateQrCode($hash, 'ruby-rose');

        if (!$qrcode) {
            $data['error'] = 'Cadastro já presente no evento da Ruby Rose';
            return view('qrerror', ['data' => $data]);
        }
        
        $data['list'] = [
            'msg' => 'Seja bem vindo ao evento da Ruby Rose, '. $qrcode->nome
        ];
        return view('qrcode', ['data' => $data]);
    }

    public function validateMeluQrCode($hash) 
    {
        $data = ['error' => null, 'list' => []];
        $qrcode = $this->validateQrCode($hash, 'melu');

        if (!$qrcode) {
            $data['error'] = 'Cadastro já presente no evento da Melu';
            return view('qrerror', ['data' => $data]);
        } 
        $data['list'] = [
            'msg' => 'Seja bem vindo ao evento da Melu, '. $qrcode->nome
        ];
        return view('qrcode', ['data' => $data]);
    }

    private function validateQrCode($hash, $evento)
    {
        switch ($evento) {
            case 'melu':
                $pessoa = PessoaMelu::where(['hash' => $hash])->first();
                $agendamento = AgendamentoMelu::where(['pessoa' => $pessoa->id])->first();
                if ($agendamento->used == 0) {
                    $agendamento->used = true;
                    $agendamento->save();
                } else {
                    return false;
                }
                return $pessoa;
                break;
            case 'ruby-rose':
                $pessoa = Pessoa::where(['hash' => $hash])->first();
                // $pessoa = Pessoa::where(['cpf' => '452.511.148-85'])->first();
                $agendamento = Agendamento::where(['pessoa' => $pessoa->id])->first();
                if (!$agendamento->used) {
                    $agendamento->used = true;
                    $agendamento->save();
                } else {
                    return false;
                }
                return $pessoa;
                break;
            default:
                die('Evento Inválido');
                break;
        }
    }

    private function getAgendamentosByData()
    {
        $agendamentos = Agendamento::get();
        $datas = [
            '02-09-2023' => [],
            '03-09-2023' => [],
            '04-09-2023' => [],
            '05-09-2023' => []
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
        $pessoa->hash = $data['hash'];
        $pessoa->save();

        return $pessoa;
    }

    private function addPessoaMelu($data, PessoaMelu $pessoa)
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
        $pessoa->hash = $data['hash'];
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

    private function addAgendamentoMelu($data, $id, AgendamentoMelu $agendamento)
    {
        $agendamento->pessoa = $id;
        $agendamento->data_hora = $data['data_hora'];
        $agendamento->save();

        return $agendamento->id;
    }

    private function enviaEmail($data, $melu)
    {
        $diaSemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'];
        $semana = date('w', strtotime($data['data_hora']));

        $data['dia_semana'] = $diaSemana[$semana];

        Mail::send(new \App\Mail\newCredenciamento($data, $melu));
    }

    private function generateQrCode($hash, $evento)
    {
        // $url = 'https://rubyroseeventos.devbatista.com/'. $evento .'/'. $hash;
        $url = 'https://api.rubyroseeventos.com.br/'. $evento .'/'. $hash;
        $options = new QROptions([
            'version' => 5,
            'eccLevel' => QRCode::ECC_L,
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'imageBase64' => false
        ]);

        file_put_contents("qrcodes/$hash.png", (new QRCode($options))->render($url));
    }
}
