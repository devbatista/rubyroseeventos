<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CredenciamentoController;
use App\Http\Controllers\PdfController;

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

Route::get('/credenciamento', [CredenciamentoController::class, 'index']);
Route::post('/credenciamento', [CredenciamentoController::class, 'create']);
Route::get('/credenciamento/horas-inativas', [CredenciamentoController::class, 'getHorasInativas']);
Route::get('/admin/agendamentos', [CredenciamentoController::class, 'getAgendamentos']);

Route::get('download-doc', [PdfController::class, 'getPdf']);

Route::get('pdf2', function(){
    $data = [
        'nome' => 'Sal Ve',
        'email' => 'salve@gmail.com',
        'data_hora' => '2021-11-21 15:30',
        'cpf' => '306.123.522-09',
    ];

    $data['dia_semana'] = 'sabado';
    return view('pdf', ['data' => $data]);
});

Route::get('pdf', [PdfController::class, 'getPdf']);