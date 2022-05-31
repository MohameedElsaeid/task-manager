<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\TasksDataObject;
use App\Exceptions\CreateTaskFaildException;
use App\Http\Requests\CreateTaskRequest;
use App\Services\AdminsService;
use App\Services\TasksService;
use App\Services\UsersService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    private TasksService $tasksService;
    private UsersService $usersService;
    private AdminsService $adminsService;

    public function __construct(TasksService $tasksService, UsersService $usersService, AdminsService $adminsService)
    {
        $this->tasksService = $tasksService;
        $this->usersService = $usersService;
        $this->adminsService = $adminsService;
    }
    public function create(): Factory|View|Application
    {
        $users = $this->usersService->getAllUsers();
        $admins = $this->adminsService->getAllAdmins();
        return view('dashboard.tasks.create', [
            'users' => $users,
            'admins' => $admins
        ]);
    }


    public function store(CreateTaskRequest $request): Redirector|Application|RedirectResponse
    {

        $taskDataObject = TasksDataObject::fromRequest($request);

        try {

            $this->tasksService->creatTask($taskDataObject);

        } catch (CreateTaskFaildException $exception) {

            return back()->withErrors($exception->getMessage());

        }

        return redirect(route('task.get.all'), Response::HTTP_CREATED);
    }

    public function index(): Factory|View|Application
    {
        $tasks = $this->tasksService->getAllTasks();
        return view('dashboard.tasks.index', [
            'tasks' => $tasks
        ]);
    }

}
