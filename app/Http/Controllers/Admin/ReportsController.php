<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Charts\ReportsChart;

class ReportsController extends Controller
{
    public function months(ReportsChart $chart)
    {
        $chart->labels(['JAN', 'FEV', 'MAR']);

        $chart->dataset('2018', 'bar', [
            10, 18, 69
        ]);
        
        // $chart->dataset('2019', 'line', [
        $chart->dataset('2019', 'bar', [
            12, 14, 16
        ])
        ->options([
            'backgroundColor' => '#999'
        ]);

        return view('admin.charts.chart', compact('chart'));
    }
}
