<?php

use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('tasks')->group(static function () {
    Route::get('/', [TaskController::class, 'index'])->name('task.get.all');
    Route::get('/create', [TaskController::class, 'create'])->name('task.get.create');
    Route::post('/store', [TaskController::class, 'store'])->name('task.post.create');
});
Route::prefix('statistics')->group(static function () {
    Route::get('/', [StatisticsController::class, 'index'])->name('statistics.get.all');
});
