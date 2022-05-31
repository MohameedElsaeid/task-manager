<?php

namespace App\Http\Controllers;

use App\Services\StatisticsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class StatisticsController extends Controller
{
    private StatisticsService $statisticsService;

    public function __construct(StatisticsService $statisticsService)
    {
        $this->statisticsService = $statisticsService;
    }

    public function index(): Factory|View|Application
    {
        $usersStatistics = $this->statisticsService->getUsersStatistics();
        return view('dashboard.statistics.index', [
            'usersStatistics' => $usersStatistics
        ]);
    }
}
