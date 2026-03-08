<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

//======= HOME =======
Route::get('/', function () {
    return view('home');
}) ->name('home');


//======= Sem uso =======
Route::get('/montar', function () {
    return view('montar');
})->name('montar');

Route::get('/agendar', function(){
    return view('agendar');
})->name('agendar');


//======= Login =======
Route::get('/login', function(){
    return view('login');
})->name('login');


//======= Clientes =======
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');

Route::get('/clientes/criar', [ClienteController::class, 'create'])->name('clientes.criar');

Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');

Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

Route::post('/clientes/search', [ClienteController::class, 'search'])->name('clientes.search');

Route::get('/clientes/{id}/editar', [ClienteController::class, 'edit'])->name('clientes.editar');

Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');

Route::get('/clientes/{id}', [ClienteController::class, 'show'])->name('clientes.exibir');



