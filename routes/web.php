<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ServicoController;

//======= HOME =======
Route::get('/', function () {
    return view('home');
}) ->name('home');  


//======= Agendamentos =======
Route::get('/agendamentos', [AgendamentoController::class, 'index'])->name('agendamentos.index');

Route::get('/agendamentos/criar', [AgendamentoController::class, 'create'])->name('agendamentos.criar');

Route::post('/agendamentos', [AgendamentoController::class, 'store'])->name('agendamentos.store');

Route::delete('/agendamentos/{id}', [AgendamentoController::class, 'destroy'])->name('agendamentos.destroy');

Route::post('/agendamentos/search', [AgendamentoController::class, 'search'])->name('agendamentos.search');

Route::get('/agendamentos/{id}/editar', [AgendamentoController::class, 'edit'])->name('agendamentos.editar');

Route::put('/agendamentos/{id}', [AgendamentoController::class, 'update'])->name('agendamentos.update');

Route::get('/agendamentos/{id}', [AgendamentoController::class, 'show'])->name('agendamentos.exibir');



//======= Clientes =======
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');

Route::get('/clientes/criar', [ClienteController::class, 'create'])->name('clientes.criar');

Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');

Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

Route::post('/clientes/search', [ClienteController::class, 'search'])->name('clientes.search');

Route::get('/clientes/{id}/editar', [ClienteController::class, 'edit'])->name('clientes.editar');

Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');

Route::get('/clientes/{id}', [ClienteController::class, 'show'])->name('clientes.exibir');


//======= Servicos =======
Route::get('/servicos', [ServicoController::class, 'index'])->name('servicos.index');

Route::get('/servicos/criar', [ServicoController::class, 'create'])->name('servicos.criar');

Route::post('/servicos', [ServicoController::class, 'store'])->name('servicos.store');

Route::delete('/servicos/{id}', [ServicoController::class, 'destroy'])->name('servicos.destroy');

Route::post('/servicos/search', [ServicoController::class, 'search'])->name('servicos.search');

Route::get('/servicos/{id}/editar', [ServicoController::class, 'editar'])->name('servicos.editar');

Route::put('/servicos/{id}', [ServicoController::class, 'update'])->name('servicos.update');

Route::get('/servicos/{id}', [ServicoController::class, 'show'])->name('servicos.exibir');  
