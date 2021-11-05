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

Route::get('pdf', [PdfController::class, 'getPdf']);

Route::get('pdf2', function(){
    return view('pdf', ['salve' => 'salve']);
});

Route::get('envio-email', function() {
    Illuminate\Support\facades\Mail::send(new \App\Mail\newCredenciamento());
    // return new \App\Mail\newCredenciamento();
});

Route::get('email', function() {
    return view('mail', ['salve' => 'salve']);
});