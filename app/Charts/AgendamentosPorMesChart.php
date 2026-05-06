<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;


class AgendamentosPorMesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $dados = DB::table('agendamentos')
            ->select(DB::raw('MONTH(data) as mes'), DB::raw('count(1) as total'))
            ->whereYear('data', 2026)
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        $meses = [];
        $quantidade = [];

        $nomesMeses = [
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro'
        ];

        foreach ($dados as $item){
            $meses[] = $nomesMeses[$item->mes];
            $quantidade[] = $item->total;
        }

        return $this->chart->barChart()
            ->addData($quantidade)
            ->setXAxis($meses)
            ->setLabels($meses);
    }
}
