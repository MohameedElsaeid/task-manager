<?php

namespace App\Services;

use App\Repositories\StatisticsRepository;
use Illuminate\Database\Eloquent\Collection;

class StatisticsService
{
    private StatisticsRepository $statisticsRepository;

    public function __construct(StatisticsRepository $statisticsRepository)
    {
        $this->statisticsRepository = $statisticsRepository;
    }

    public function getUsersStatistics(): Collection|array
    {
        return $this->statisticsRepository->get();
    }
}
