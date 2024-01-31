<?php

use App\Models\Juego;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
	
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
	Route::get('/dashboard', [DashboardController::class, 'mostrarDashboard'])->name('dashboard');
   
});
Route::get('/admin/settings', 'App\Http\Controllers\UsuarioController@profile');

Auth::routes(
	// ['register'=>false,'reset'=>false]
);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('equipointegrantes', 'livewire.equipointegrantes.index')->middleware('auth');
	Route::view('equipos', 'livewire.equipos.index')->middleware('auth');
	Route::view('partidasusuarios', 'livewire.partidasusuarios.index')->middleware('auth');
	Route::view('partidas', 'livewire.partidas.index')->middleware('auth');
	Route::view('comprobantes', 'livewire.comprobantes.index')->middleware('auth');
	Route::view('juegos', 'livewire.juegos.index')->middleware('auth');
	Route::view('Egresos', 'livewire.Egresos.index')->middleware('auth');
	Route::view('ingresos', 'livewire.ingresos.index')->middleware('auth');
	Route::view('usuarios', 'livewire.usuarios.index')->middleware('auth');
	Route::view('rols', 'livewire.rols.index')->middleware('auth');

	//Mostar Datos Juegos
	route::get('/',[JuegoController::class,'mostrarJuegos']);