<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //Route::get('/profile',[UsuarioController::class,'profile']);
<<<<<<< Updated upstream
    Route::get('/profile', 'App\Http\Controllers\UsuarioController@profile');
=======
<<<<<<< HEAD
    Route::get('/admin/settings', 'App\Http\Controllers\UsuarioController@profile');
=======
    Route::get('/profile', 'App\Http\Controllers\UsuarioController@profile');
>>>>>>> 1b3a0299d3a2fd1e7f4ca841884b9a881f9bff60
>>>>>>> Stashed changes
});
