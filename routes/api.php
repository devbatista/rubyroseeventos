<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CgendamentoController;

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