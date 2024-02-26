<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatosApi; // Importar el controlador que se va a usar


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

Route::get('/ingresos', [DatosApi::class, 'ingresos']);
Route::get('/carreras', [DatosApi::class, 'Carreras']);
Route::get('/egresos', [DatosApi::class, 'egresos']);
Route::get('/inscritosPorJuego', [DatosApi::class, 'inscritosPorJuego']);
Route::get('/personasInscritasPorModalidad', [DatosApi::class, 'personasInscritasPorModalidad']);
Route::get('/totalInscritos', [DatosApi::class, 'totalInscritos']);
Route::get('/totalJuegos', [DatosApi::class, 'totalJuegos']);
Route::get('/saldo', [DatosApi::class, 'saldo']);