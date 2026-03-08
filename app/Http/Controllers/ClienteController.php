<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    function index() {
        $clientes = Cliente::all();
        return view('clientes.listar_clientes', compact('clientes'));
    }
    
    //Mostra formulário para criar novo cliente

    function create() {
        return view('clientes.criar_clientes');
    }

    //Salva novo cliente no banco de dados

    function store(Request $request) {
        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!');
    }

    //Exibe detalhes de um cliente específico

    function show($id) {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.exibir_clientes', compact('cliente'));
    }

    //Mostra formulário para editar um cliente 

    function edit($id) {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.editar_clientes', compact('cliente'));
    }

    //Atualiza um cliente no banco de dados

    function update(Request $request, $id) {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    //Deleta um cliente do banco de dados

    function destroy($id) {
        Cliente::findOrFail($id)->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente deletado com sucesso!');
    }

    //Busca clientes por nome ou email

    function search(Request $request) {
        if(!empty($request->valor)){
            $clientes = Cliente::where($request->tipo,'like','%'. $request->valor . '%')->get();
        }else {
            $clientes = Cliente::all();
        }
        return view('clientes.listar_clientes', ['clientes'=>$clientes]);
        
    }
}
