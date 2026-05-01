<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;
use App\Models\CategoriaEstoque;

class EstoqueController extends Controller
{
    function index(CategoriaEstoque $categoria) {

        $estoques = $categoria->estoques()->with('categoria')->get();

        return view('estoque.listar_estoque', [
            'estoques' => $estoques,
            'categoria' => $categoria
        ]);
    }

    function create(Request $request) {
            $categorias = CategoriaEstoque::all();

            $categoriaSelecionada = CategoriaEstoque::findOrFail($request->categoria_id);

            return view('estoque.criar_estoque', [
                'categorias' => $categorias,
                'categoriaSelecionada' => $categoriaSelecionada
            ]);
        }
    function validateRequest(Request $request){
        $request->validate([
            'nome' => 'required',
            'quantidade' => 'required',
            'categoria_id' => 'required'
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'quantidade.required' => 'Quantidade é obrigatória.',
            'categoria_id.required' => 'Selecione uma categoria.'
        ]);
    }

    function store(Request $request) {
        $this->validateRequest($request);

        $estoque = Estoque::create($request->all());

        return redirect()->route('categorias.estoque', $estoque->categoria_id)
            ->with('success', 'Produto criado com sucesso!');
    }

    function show($id) {
        $estoque = Estoque::with('categoria')->findOrFail($id);
        return view('estoque.exibir_estoque', compact('estoque'));
    }

    function edit($id) {
        $estoque = Estoque::findOrFail($id);
        $categorias = CategoriaEstoque::all();

        return view('estoque.editar_estoque', [
            'estoque' => $estoque,
            'categorias' => $categorias,
        ]);
    }

    function update(Request $request, $id) {
        $this->validateRequest($request);

        $estoque = Estoque::findOrFail($id);
        $estoque->update($request->all());

        return redirect()->route('categorias.estoque', $estoque->categoria_id)
            ->with('success', 'Produto atualizado com sucesso!');
    }

    function destroy($id) {
        $estoque = Estoque::findOrFail($id);
        $categoria_id = $estoque->categoria_id;
        $estoque->delete();

        return redirect()->route('categorias.estoque', $categoria_id)
            ->with('success', 'Produto deletado com sucesso!');
    }

    public function search(Request $request) {
        $categoria = CategoriaEstoque::findOrFail($request->categoria_id);

        if (!empty($request->valor)) {
            $estoques = Estoque::where('categoria_id', $categoria->id)
                ->where($request->tipo, 'like', '%' . $request->valor . '%')
                ->get();
        } else {
            $estoques = Estoque::where('categoria_id', $categoria->id)->with('categoria')->orderBy('id')->get();
        }

        return view('estoque.listar_estoque', ['estoques' => $estoques, 'categoria' => $categoria]);
    }
}