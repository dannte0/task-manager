<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('index');

Route::get('notes/create/{task}', [NoteController::class, 'create'])->name('notes.create');

Route::post('notes/{task}', [NoteController::class, 'store'])->name('notes.store');

Route::put('/check-task/{task}', [TaskController::class, 'setHasComplete'])->name('check.task');

Route::resource('tasks', TaskController::class);