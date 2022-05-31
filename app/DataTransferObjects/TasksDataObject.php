<?php

namespace App\DataTransferObjects;

use Illuminate\Http\Request;

class TasksDataObject implements ArrayAble
{

    private string $taskTitle;
    private string $taskDescription;
    private int $userId;
    private int $adminId;

    public function __construct(Request $request)
    {
        $this->taskTitle = $request->get('taskTitle');
        $this->taskDescription = $request->get('taskDescription');
        $this->userId = $request->get('assigneeUserId');
        $this->adminId = $request->get('reporterAdminId');
    }

    public static function fromRequest(Request $request): TasksDataObject
    {
        return new self($request);
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->getUserId(),
            'admin_id' => $this->getAdminId(),
            'task_description' => $this->getTaskDescription(),
            'task_title' => $this->getTaskTitle()
        ];
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getAdminId(): int
    {
        return $this->adminId;
    }

    public function getTaskDescription(): string
    {
        return $this->taskDescription;
    }

    public function getTaskTitle(): string
    {
        return $this->taskTitle;
    }
}
