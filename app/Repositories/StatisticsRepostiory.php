<?php

namespace App\Repositories;

use App\Models\UserStatistic;
use Illuminate\Database\Eloquent\Collection;

class StatisticsRepostiory
{
    private UserStatistic $userStatistic;

    public function __construct(UserStatistic $userStatistic)
    {
        $this->userStatistic = $userStatistic;
    }


    public function get(): Collection|array
    {
        return $this->userStatistic->newQuery()
            ->join('users', 'users.user_id', 'user_statistics.user_id')
            ->select([
                'users.name as user_name',
                'user_statistics.id',
                'user_statistics.tasks_count'
            ])
            ->orderByDesc('tasks_count')
            ->limit(10)
            ->get();
    }
}
