<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/clientes', function(){
    return view('clientes.listar_clientes');
})->name('clientes.index');

Route::get('/clientes/criar', function(){
    return view('clientes.criar_clientes');
})->name('clientes.criar');

Route::get('/clientes/{id}/editar', function($id){
    return view('clientes.editar_clientes');
})->name('clientes.editar');

Route::get('/clientes/{id}', function($id){
    return view('clientes.exibir_clientes');
})->name('clientes.exibir');

