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

Route::get('download-doc', [PdfController::class, 'getPdf']);

Route::get('pdf2', function(){
    $data = [
        'nome' => 'Rafael Batista',
        'email' => 'batist11@gmail.com',
        'data_hora' => '2021-11-21 15:30',
        'cpf' => '399.328.998-60',
    ];

    $data['dia_semana'] = 'sabado';
    return view('pdf', ['data' => $data]);
});

Route::get('envio-email', function() {
    Illuminate\Support\facades\Mail::send(new \App\Mail\newCredenciamento());
    // return new \App\Mail\newCredenciamento();
});

Route::get('email', function() {
    return view('mail', ['salve' => 'salve']);
});