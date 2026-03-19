<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    function index() {
        $servicos = Servico::all();
        return view('servicos.listar_servico', compact('servicos'));
    }

    public function create() {
        return view('servicos.criar_servico');
    }

    public function validateRequest(Request $request){

        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required',
            
            'imagem'=> 'nullable|file|image|mimes:jpeg,png,jpg',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'preco.required' => 'O campo preço é obrigatório.',
            
            'imagem.image' => 'O arquivo deve ser uma imagem.',
            'imagem.mimes' => 'A imagem deve ser do tipo jpeg, png ou jpg.',
        ]);

    }

    public function store(Request $request) {

        $this->validateRequest($request);

        $data = $request->except('imagem');
    

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $nome_imagem = date('YmdiHs').".".$imagem->getClientOriginalExtension();
            $diretorio = "images/imagem_servicos/";
            $imagem->storeAs($diretorio, $nome_imagem, 'public');
            $data['imagem'] = $diretorio . $nome_imagem;
        }

        Servico::create($data);

        return redirect()->route('servicos.index')
            ->with('success', 'Serviço criado com sucesso!');
    }

    public function show($id) {
        $servico = Servico::findOrFail($id);
        return view('servicos.exibir_servico', compact('servico'));
    }

    function editar($id) {
        $servico = Servico::findOrFail($id);
        return view('servicos.editar_servico', compact('servico'));
    }

    public function update(Request $request, $id){
        $this->validateRequest($request);
        $servico = Servico::findOrFail($id);
        $data = $request->except('imagem');

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $nome_imagem = date('YmdiHs').".".$imagem->getClientOriginalExtension();
            $diretorio = "images/imagem_servicos/";
            $imagem->storeAs($diretorio, $nome_imagem, 'public');
            $data['imagem'] = $diretorio . $nome_imagem;
        }

        $servico->update($data);
        return redirect()->route('servicos.index')->with('success', 'Serviço atualizado com sucesso!');

    }

    function destroy($id) {
        Servico::findOrFail($id)->delete();
        return redirect()->route('servicos.index')->with('success', 'Serviço deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $query = Servico::query();
        if ($request->decoracao_3d) {
            $query->where('decoracao_3d', 1);
        }
        if ($request->esmalte_especial) {
            $query->where('esmalte_especial', 1);
        }

        if ($request->filled('tipo') && $request->filled('valor')) {

            if ($request->tipo == 'nome') {
                $query->where('nome', 'like', '%' . $request->valor . '%');
            }
            if ($request->tipo == 'preco') {
                $query->where('preco', 'like', '%' . $request->valor . '%');
            }
        }

        $servicos = $query->get();

        return view('servicos.listar_servico', compact('servicos'));
    }

}
