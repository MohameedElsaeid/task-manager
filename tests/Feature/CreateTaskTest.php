<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Task;
use App\Models\User;
use App\Models\UserTask;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    use DatabaseMigrations, WithoutMiddleware;

    public function test_can_create_task(): void
    {
        $user = User::factory()->count(1)->create();
        $admin = Admin::factory()->count(1)->create();

        $response = $this->post('tasks/store', [
            'taskTitle' => 'test',
            'taskDescription' => 'test',
            'assigneeUserId' => $user[0]->user_id,
            'reporterAdminId' => $admin[0]->admin_id,
        ]);
        $userTask = UserTask::where([
            'user_id' => $user[0]->user_id,
            'admin_id' => $admin[0]->admin_id
        ])->first();

        $task = Task::where('task_id', $userTask->task_id)->first();

        $response->assertStatus(201);
        $response->assertRedirect('/tasks');
        $this->assertModelExists($userTask);
        $this->assertModelExists($task);
        $this->assertEquals($user[0]->user_id, $userTask->user_id);
        $this->assertEquals($admin[0]->admin_id, $userTask->admin_id);
        $this->assertEquals($task->task_id, $userTask->task_id);
    }

}
