<?php

use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/task', [TaskController::class, 'store'])->name('tasks.store');
Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');