<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaEstoque;
use App\Charts\ProdutosPorCategoriaChart;

class CategoriaEstoqueController extends Controller
{
    function index(ProdutosPorCategoriaChart $chart) {
        $categorias = CategoriaEstoque::all();

        // Adicionamos o grafico em index() pois ele é exibido na view listar_categorias
        $grafico = $chart->build();

        return view('categorias.listar_categorias', [
        'categorias' => $categorias,
        'grafico' => $grafico
    ]);
    }

    function create() {
        return view('categorias.criar_categorias');
    }

    function validateRequest(Request $request){
        $request->validate([
            'nome' => 'required',
            'premium' => 'required|boolean'
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'premium.required' => 'O campo premium é obrigatório.',
        ]);
    }

    function store(Request $request) {
        $this->validateRequest($request);
        CategoriaEstoque::create($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'CategoriaEstoque criada com sucesso!');
    }

    function show($id) {
        $categoria = CategoriaEstoque::findOrFail($id);
        return view('categorias.exibir_categorias', compact('categoria'));
    }

    function edit($id) {
        $categoria = CategoriaEstoque::findOrFail($id);
        return view('categorias.editar_categorias', compact('categoria'));
    }

    function update(Request $request, $id) {
        $this->validateRequest($request);

        $categoria = CategoriaEstoque::findOrFail($id);
        $categoria->update($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'CategoriaEstoque atualizada com sucesso!');
    }

    function destroy($id) {
        CategoriaEstoque::findOrFail($id)->delete();

        return redirect()->route('categorias.index')
            ->with('success', 'CategoriaEstoque deletada com sucesso!');
    }

    public function search(Request $request) {

    $query = CategoriaEstoque::withCount('estoques');

    if (!empty($request->valor)) {
        $query->where($request->tipo, 'like', '%' . $request->valor . '%');
    }

    $categorias = $query->get();

    return view('categorias.listar_categorias', compact('categorias'));
    }

}