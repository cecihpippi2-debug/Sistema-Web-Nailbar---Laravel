<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;


class ProdutosPorCategoriaChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $produtosPorCategoria = DB::table('estoque')
            ->join('categorias', 'categorias.id', '=', 'estoque.categoria_id')
            ->select('categorias.nome', DB::raw('count(1) as qtd_produtos'))
            ->groupBy('categorias.nome')
            ->orderBy('qtd_produtos', 'desc')
            ->get();

        $qtdProdutos = [];
        $nomeCategorias = [];

        foreach ($produtosPorCategoria as $item) {
            $qtdProdutos[] = $item->qtd_produtos;
            $nomeCategorias[] = $item->nome;
        }

        return $this->chart->pieChart()
            ->setTitle('Quantidade de Produtos no Estoque por Categoria')
            ->setColors(['#ff9fe7', '#e6096d', '#ff07a4', '#3c91dc', '#28a745'])
            ->addData($qtdProdutos)
            ->setLabels($nomeCategorias);
    }
}
