<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TaskRepository
{
    private Task $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function create(array $taskData): Task
    {
        return $this->task->create($taskData);
    }

    public function get(): LengthAwarePaginator
    {
        return $this->task->newQuery()
            ->join('user_tasks', 'user_tasks.task_id', 'tasks.task_id')
            ->join('users', 'users.user_id', 'user_tasks.user_id')
            ->join('admins', 'admins.admin_id', 'user_tasks.admin_id')
            ->select([
                'tasks.task_id',
                'tasks.task_title',
                'tasks.task_description',
                'users.name as user_name',
                'admins.name as admin_name',
            ])
            ->orderByDesc('tasks.created_at')
            ->paginate(10);
    }
}
