<?php

namespace App\Services;

use App\Repositories\StatisticsRepostiory;
use Illuminate\Database\Eloquent\Collection;

class StatisticsService
{
    private StatisticsRepostiory $statisticsRepository;

    public function __construct(StatisticsRepostiory $statisticsRepository)
    {
        $this->statisticsRepository = $statisticsRepository;
    }

    public function getUsersStatistics(): Collection|array
    {
        return $this->statisticsRepository->get();
    }
}
