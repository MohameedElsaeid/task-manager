<?php

namespace App\Jobs;

use App\Models\UserTask;
use App\Repositories\UserStatisticRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateOrCreateUserStatisticsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public UserTask $userTask;

    public function __construct(UserTask $userTask)
    {
        $this->userTask = $userTask;
    }

    public function handle(UserStatisticRepository $userStatisticRepository): void
    {
        $userStatistic = $userStatisticRepository->findOrCreateByUserId($this->userTask->user_id);

        $userStatisticRepository->incrementUserTasksCount($userStatistic);
    }
}
