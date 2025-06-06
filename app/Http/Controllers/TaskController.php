<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::all();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Task::create($validated);

        return redirect()->route('index')->with('message', 'The task has been created!');
    }

    public function show(Task $task): View
    {
        return view('tasks.show', ['task'=> $task]);
    }

    public function edit(Task $task): View
    {
        return view('tasks.edit', ['task'=> $task]);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $validated = $request->validated();

        $task->update($validated);

        return redirect()->route('tasks.show', $task)->with('message', 'The task has been updated!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('index')->with('message', 'The task has been deleted!');
    }
}
