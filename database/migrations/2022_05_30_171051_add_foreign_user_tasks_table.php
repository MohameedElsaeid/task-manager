<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('user_tasks', static function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('admin_id')
                ->references('admin_id')
                ->on('admins')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('task_id')
                ->references('task_id')
                ->on('tasks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('user_tasks', static function (Blueprint $table) {
            $table->dropForeign(['user_id', 'admin_id', 'task_id']);
        });
    }
};
