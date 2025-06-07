<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('index');


Route::put('/check-task/{task}', [TaskController::class, 'setHasComplete'])->name('check.task');

Route::resource('tasks', TaskController::class);