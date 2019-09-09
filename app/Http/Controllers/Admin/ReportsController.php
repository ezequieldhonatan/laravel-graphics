<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Charts\ReportsChart;
use App\Repositories\Contracts\ReportsRepositoryInterface;
use App\Enum\Enum;

class ReportsController extends Controller
{
    private $repository;

    public function __construct(ReportsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function months(ReportsChart $chart)
    {
        $chart->labels(Enum::months());

        $chart->dataset('2017', 'bar', $this->repository->byMonths(2017));
        
        // $chart->dataset('2019', 'line', [
        $chart->dataset('2018', 'bar', $this->repository->byMonths(2018))
        ->options([
            'backgroundColor' => '#999'
        ]);

        return view('admin.charts.chart', compact('chart'));
    }

    public function months2(ReportsChart $chart)
    {
        $chart = $this->repository->getReports(2016, 2018);

        return view('admin.charts.chart', compact('chart'));
    }

    public function year(ReportsChart $chart)
    {
        $response = $this->repository->getDataYears();

        $chart->labels($response['labels'])
                // ->dataset('Relatório de vendas', 'line', $response['values'])
                // ->backgroundColor('blue');
                ->dataset('Relatório de vendas', 'bar', $response['values'])
                ->color('black')
                ->backgroundColor($response['backgrounds']);

        return view('admin.charts.chart', compact('chart'));
    }
}
