<?php

namespace App\Repositories\Core\QueryBuilder;

use DB;
use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\ReportsRepositoryInterface;

class QueryBuilderReportsRepository extends BaseQueryBuilderRepository implements ReportsRepositoryInterface
{
    protected $table = 'orders';

    public function byMonths(int $year):array
    {
        $dataset = $this->db
                    ->table($this->tb)
                    ->select(DB::raw('sum(total) as sums'), DB::raw('MONTH(date) as months'))
                    ->groupBy(DB::raw('MONTH(date)'))
                    // ->whereYear('payment_method', $year)
                    ->whereYear('date', $year)
                    ->pluck('sums')
                    ->toArray();

        /*
        $dataset = [];
        foreach ($reports as $key => $value) {
            $dataset[] = $value->sums;
        }
        */

        return $dataset;
    }
}