<?php

namespace App\Http\Controllers;

use App\Services\TasksService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class TaskController extends Controller
{
    private TasksService $tasksService;

    public function __construct(TasksService $tasksService)
    {
        $this->tasksService = $tasksService;
    }

    public function index(): Factory|View|Application
    {
        $tasks = $this->tasksService->getAllTasks();
        return view('dashboard.tasks.index', [
            'tasks' => $tasks
        ]);
    }

}
