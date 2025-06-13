<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('index');

Route::get('notes/{task}/create', [NoteController::class, 'create'])->name('notes.create');
Route::get('notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
Route::post('notes/{task}', [NoteController::class, 'store'])->name('notes.store');
Route::put('notes/{note}', [NoteController::class, 'update'])->name('notes.update');
Route::delete('notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');


Route::resource('tasks', TaskController::class);
Route::put('/check-task/{task}', [TaskController::class, 'setHasComplete'])->name('check.task');
Route::put('/pin-task/{task}', [TaskController::class, 'setPinned'])->name('pin.task');