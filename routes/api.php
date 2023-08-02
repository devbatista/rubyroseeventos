<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CredenciamentoController;
use App\Http\Controllers\PdfController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

Route::get('/', [CredenciamentoController::class, 'index']);

Route::get('/cadastro_2', function() {
    return view('cadastro2');
});

Route::get('/credenciamento_teste', [CredenciamentoController::class, 'index']);
Route::post('/credenciamento', [CredenciamentoController::class, 'create']);
Route::post('/melu/credenciamento', [CredenciamentoController::class, 'createMelu']);
Route::get('/credenciamento/horas-inativas', [CredenciamentoController::class, 'getHorasInativas']);
Route::get('/admin/agendamentos', [CredenciamentoController::class, 'getAgendamentos']);

Route::get('/ruby-rose/{hash}', [CredenciamentoController::class, 'validateRubyRoseQrCode']);
Route::get('/melu/{hash}', [CredenciamentoController::class, 'validateMeluQrCode']);

Route::get('/vagas-disponiveis', [CredenciamentoController::class, 'getVagasDisponiveis']);

Route::get('download-doc', [PdfController::class, 'getPdf']);

Route::get('pdf2', function(){
    $data = [
        'nome' => 'Sal Ve',
        'email' => 'salve@gmail.com',
        'data_hora' => '2021-11-21 15:30',
        'cpf' => '306.123.522-09',
        'hash' => '0ba3ba56d03369234f9a718a4759f863',
        'agendamento' => 'salve'
    ];

    $url = 'https://api.rubyroseeventos.com.br/ruby-rose/'. $data['hash'];
    $data['qrcode'] = QrCode::size(300)->generate($url);

    $data['dia_semana'] = 'sabado';
    return view('mail', ['data' => $data]);
});

Route::get('pdf', [PdfController::class, 'getPdf']);