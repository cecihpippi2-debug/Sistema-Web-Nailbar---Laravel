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

    //Valida os dados do formulário
    function validateRequest(Request $request){

        $request->validate([
            'nome' => 'required',
            'data_nascimento' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'endereco' => 'required',
            'categoria' => 'required',
            'imagem'=> 'nullable|file|image|mimes:jpeg,png,jpg',
            'observacoes' => 'nullable',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'data_nascimento.required' => 'O campo data de nascimento é obrigatório.',
            'data_nascimento.date' => 'O campo data de nascimento deve ser uma data válida.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'endereco.required' => 'O campo endereço é obrigatório.',
            'categoria.required' => 'O campo categoria é obrigatório.',
            'imagem.image' => 'O arquivo deve ser uma imagem.',
            'imagem.mimes' => 'A imagem deve ser do tipo jpeg, png ou jpg.',
        ]);

    }

    function store(Request $request) {

        $this->validateRequest($request);
        $data = $request->except('imagem');

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $nome_imagem = date('YmdiHs').".".$imagem->getClientOriginalExtension();
            $diretorio = "images/imagem_clientes/"; //Salva em storage/images/imagem_clientes
            $imagem->storeAs($diretorio, $nome_imagem, 'public');
            $data['imagem'] = $diretorio . $nome_imagem;
        }

        Cliente::create($data);
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

        $this->validateRequest($request);
        $cliente = Cliente::findOrFail($id);
        $data = $request->except('imagem');

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $nome_imagem = date('YmdiHs').".".$imagem->getClientOriginalExtension();
            $diretorio = "images/imagem_clientes/";
            $imagem->storeAs($diretorio, $nome_imagem, 'public');

            $data['imagem'] = $diretorio . $nome_imagem;
        }

        $cliente->update($data);
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
