<?php

namespace App\Repositories;

use App\Models\UserStatistic;

class UserStatisticRepository
{
    private UserStatistic $statistic;

    public function __construct(UserStatistic $statistic)
    {
        $this->statistic = $statistic;
    }

    public function findOrCreateByUserId(int $userId): UserStatistic
    {
        return $this->statistic->firstOrCreate([
            'user_id' => $userId
        ], [
            $userId
        ]);
    }

    public function incrementUserTasksCount(UserStatistic $userStatistic): void
    {
        $userStatistic->increment('tasks_count');
    }
}
