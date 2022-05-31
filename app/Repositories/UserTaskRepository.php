<?php

namespace App\Repositories;

use App\Models\UserTask;

class UserTaskRepository
{

    private UserTask $userTask;

    public function __construct(UserTask $userTask)
    {
        $this->userTask = $userTask;
    }

    public function create(array $userTaskData): UserTask
    {
        return $this->userTask->create($userTaskData);
    }
}
