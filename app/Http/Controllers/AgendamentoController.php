<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\Servico;
use App\Models\Cliente;



class AgendamentoController extends Controller
{
        function index() {
        $agendamentos = Agendamento::with(['cliente', 'servico'])->get();
        return view('agendamentos.listar_agendamentos', compact('agendamentos'));
    }

    //Mostra formulário para criar novo agendamento

   
    public function create() {
        $clientes = Cliente::all();
        $servicos = Servico::all();

        return view('agendamentos.criar_agendamentos', compact('clientes', 'servicos'));
    }

    function validateRequest(Request $request){
        $request->validate([
            'cliente_id' => 'required',
            'servico_id' => 'required',
            'data' => 'required|date',
            'hora' => 'required',
        ], [
            'cliente_id.required' => 'O campo cliente é obrigatório.',
            'servico_id.required' => 'O campo serviço é obrigatório.',
            'data.required' => 'O campo data é obrigatório.',
            'hora.required' => 'O campo hora é obrigatório.',
        ]);

    }

    function store(Request $request) {

        $this->validateRequest($request);
        
        $data = $request->only([
            'cliente_id',
            'servico_id',
            'data',
            'hora'
        ]);

        Agendamento::create($data);
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento criado com sucesso!');
    }

    //Exibe detalhes de um agendamento específico

    function show($id) {
        $agendamento = Agendamento::findOrFail($id);
        return view('agendamentos.exibir_agendamentos', compact('agendamento'));
    }

    //Mostra formulário para editar um agendamento 

    function edit($id) {
        $agendamento = Agendamento::findOrFail($id);

        $clientes = Cliente::all();
        $servicos= Servico::all();

        return view('agendamentos.editar_agendamentos', compact('agendamento', 'clientes', 'servicos' ));
    }

    //Atualiza um agendamento no banco de dados

    function update(Request $request, $id) {

        $this->validateRequest($request);

        $agendamento = Agendamento::findOrFail($id);
        $data = $request->only([
            'cliente_id',
            'servico_id',
            'data',
            'hora'
        ]);

        $agendamento->update($data);
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento atualizado com sucesso!');
    }

    //Deleta um agendamento do banco de dados

    function destroy($id) {
        Agendamento::findOrFail($id)->delete();
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento deletado com sucesso!');
    }

    //Busca agendamentos por nome ou email

    function search(Request $request) {
        $valor = $request->valor;
        $query = Agendamento::with('cliente');

        if (!empty($valor)) {
            $query->where(function($q) use ($request, $valor) {
                if ($request->tipo == 'nome') {
                    $q->whereHas('cliente', function($c) use ($valor) {
                        $c->where('nome', 'like', '%' . $valor . '%');
                    });
                }
                if ($request->tipo == 'telefone') {
                    $q->whereHas('cliente', function($c) use ($valor) {
                        $c->where('telefone', 'like', '%' . $valor . '%');
                    });
                }
                if ($request->tipo == 'data') {
                    $q->where('data', 'like', '%' . $valor . '%');
                }

            });
        }

        $agendamentos = $query->get();
        return view('agendamentos.listar_agendamentos', compact('agendamentos'));
    }

        
        
}

