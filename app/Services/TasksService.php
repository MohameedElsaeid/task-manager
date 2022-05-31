<?php

namespace App\Services;

use App\DataTransferObjects\TasksDataObject;
use App\Exceptions\CreateTaskFaildException;
use App\Models\Task;
use App\Models\UserStatistic;
use App\Models\UserTask;
use App\Repositories\TaskRepository;
use App\Repositories\UserStatisticRepository;
use App\Repositories\UserTaskRepository;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class TasksService
{
    private TaskRepository $taskRepository;
    private UserTaskRepository $userTaskRepository;
    private UserStatisticRepository $userStatisticRepository;

    public function __construct(TaskRepository $taskRepository, UserTaskRepository $userTaskRepository, UserStatisticRepository $userStatisticRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->userTaskRepository = $userTaskRepository;
        $this->userStatisticRepository = $userStatisticRepository;
    }

    /**
     * @throws \App\Exceptions\CreateTaskFaildException
     */
    public function creatTask(TasksDataObject $taskDataObject): void
    {

        $taskData = $taskDataObject->toArray();

        try {

            DB::beginTransaction();

            $task = $this->createTask($taskData);

            $userTask = $this->assignsTaskToUser($taskData, $task);

            $userStatistic = $this->createUserStatistic($userTask);

            $this->incrementUserTasks($userStatistic);

            DB::commit();

        } catch (Exception $exception) {
            DB::rollBack();
            throw new CreateTaskFaildException($exception->getMessage());
        }

    }

    private function createTask(array $taskData): Task
    {
        return $this->taskRepository->create($taskData);
    }

    private function assignsTaskToUser(array $taskData, Task $task): UserTask
    {
        $userTaskData = $this->prepareUserTaskData($taskData, $task->getTaskId());

        return $this->userTaskRepository->create($userTaskData);
    }

    private function prepareUserTaskData(array $taskData, int $taskId): array
    {
        return array_merge($taskData, [
            'task_id' => $taskId
        ]);
    }

    private function createUserStatistic(UserTask $userTask): UserStatistic
    {
        return $this->userStatisticRepository->findOrCreateByUserId($userTask->user_id);
    }

    private function incrementUserTasks(UserStatistic $userStatistic): void
    {
        $this->userStatisticRepository->incrementUserTasksCount($userStatistic);
    }

    public function getAllTasks(): LengthAwarePaginator
    {
        return $this->taskRepository->get();
    }
}
