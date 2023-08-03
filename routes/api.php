<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CredenciamentoController;
use App\Http\Controllers\PdfController;
// use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Agendamento;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/', [CredenciamentoController::class, 'index']);
Route::get('/teste',[CredenciamentoController::class, 'index']);

Route::get('/cadastro_2', function() {
    return '<img src="'.asset('qrcodes/2.png').'"/>';
});

Route::get('/credenciamento', [CredenciamentoController::class, 'index']);
Route::post('/credenciamento', [CredenciamentoController::class, 'create']);
Route::post('/melu/credenciamento', [CredenciamentoController::class, 'createMelu']);
Route::get('/credenciamento/horas-inativas', [CredenciamentoController::class, 'getHorasInativas']);
Route::get('/admin/agendamentos', [CredenciamentoController::class, 'getAgendamentos']);

Route::get('/ruby-rose/{hash}', [CredenciamentoController::class, 'validateRubyRoseQrCode']);
Route::get('/melu/{hash}', [CredenciamentoController::class, 'validateMeluQrCode']);

Route::get('/vagas-disponiveis', [CredenciamentoController::class, 'getVagasDisponiveis']);

Route::get('download-doc', [PdfController::class, 'getPdf']);

Route::get('/', function(){
    // return phpinfo();
    $data = [
        'nome' => 'Sal Ve',
        'email' => 'salve@gmail.com',
        'data_hora' => '2021-11-21 15:30',
        'cpf' => '306.123.522-09',
        'hash' => '0ba3ba56d03369234f9a718a4759f863',
        'agendamento' => 'salve'
    ];

    $url = 'https://api.rubyroseeventos.com.br/ruby-rose/'. $data['hash'];
    // $data['qrcode'] = QrCode::size(300)->generate($url);

    $data['dia_semana'] = 'sabado';
    return view('mail', ['data' => $data]);
});

Route::get('/qrcode_test', function(){
    $url = 'https://api.rubyroseeventos.com.br/';
    $rand = rand(0,10);
    // return '<img src="'.(new QRCode)->render($url).'">';
    // return QrCode::size(300)->generate("https://api.rubyroseeventos.com.br/ruby-rose/1");
    $options = new QROptions([
        'version' => 5,
        'eccLevel' => QRCode::ECC_L,
        'outputType' => QRCode::OUTPUT_IMAGE_PNG,
        'imageBase64' => false
    ]);

    file_put_contents("qrcodes/$rand.png", (new QRCode($options))->render($url));
});

Route::get('pdf', [PdfController::class, 'getPdf']);

Route::get('pdf2', function(){
    $agendamento = Agendamento::first();
    $agendamento->data = date('d/m/Y', strtotime($agendamento->data_hora));
    $agendamento->hora = date('H:i', strtotime($agendamento->data_hora));
    $diaSemana = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'];
    $semana = date('w', strtotime($agendamento->data_hora));
    $agendamento->qrcode = QrCode::size(300)->generate("https://api.rubyroseeventos.com/ruby-rose/1");

    $agendamento->dia_semana = $diaSemana[$semana];

    return view('pdf', ['agendamento' => $agendamento]);

    $pdf = PDF::loadView('pdf', ['agendamento' => $agendamento]);
    return $pdf->setPaper('a4')->download('agendamento.pdf');
});