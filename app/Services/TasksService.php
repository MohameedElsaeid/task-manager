<?php

namespace App\Services;

use App\Repositories\TaskRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TasksService
{
    private TaskRepository $taskRepository;


    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getAllTasks(): LengthAwarePaginator
    {
        return $this->taskRepository->get();
    }
}
