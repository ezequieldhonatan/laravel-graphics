<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ReportsRepositoryInterface;

class ReportsApiController extends Controller
{
    protected $repository;

    public function __construct(ReportsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function months(Request $request)
    {
        $response = $this->repository->getReportsMonthByYear(2018);

        return response()->json($response);
    }
}
