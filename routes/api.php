<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppMovilController;

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

Route::post('/login', [AppMovilController::class,'login']);

Route::get('/profesionales', [AppMovilController::class,'listadoProfesionales'])->middleware('auth:sanctum');

Route::get('/turno', [AppMovilController::class,'getTurno'])->middleware('auth:sanctum');

Route::get('/listado', [AppMovilController::class,'getListadoTurnos'])->middleware('auth:sanctum');

Route::post('/new', [AppMovilController::class,'crearTurno'])->middleware('auth:sanctum');

Route::post('/finish', [AppMovilController::class,'finalizarTurno'])->middleware('auth:sanctum');

Route::post('/cancel', [AppMovilController::class,'cancelarTurno'])->middleware('auth:sanctum');

Route::post('/delete', [AppMovilController::class,'eliminarTurno'])->middleware('auth:sanctum');

Route::post('/form', [AppMovilController::class,'enviarFormulario'])->middleware('auth:sanctum');

Route::post('/logout', [AppMovilController::class,'logout'])->middleware('auth:sanctum');

