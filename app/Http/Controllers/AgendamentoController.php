<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;


class AgendamentoController extends Controller
{
        function index() {
        $agendamentos = Agendamento::all();
        return view('agendamentos.listar_agendamentos', compact('agendamentos'));
    }

    //Mostra formulário para criar novo agendamento

    function create() {
        return view('agendamentos.criar_agendamentos');
    }

    //Salva novo agendamento no banco de dados

    function validateRequest(Request $request){

        $request->validate([
            'cliente_id' => 'required',
            'servico_id' => 'required',
            'data' => 'required',
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
        $data = $request->all();

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
        return view('agendamentos.editar_agendamentos', compact('agendamento'));
    }

    //Atualiza um agendamento no banco de dados

    function update(Request $request, $id) {

        $this->validateRequest($request);
        $agendamento = Agendamento::findOrFail($id);
        $data = $request->all();

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
        if(!empty($request->valor)){
            $agendamentos = Agendamento::where($request->tipo,'like','%'. $request->valor . '%')->get();
        }else {
            $agendamentos = Agendamento::all();
        }
        return view('agendamentos.listar_agendamentos', ['agendamentos'=>$agendamentos]);
        
    }
}
