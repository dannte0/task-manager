<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(Request $request): View
    {
        $title = $request->input('search');

        $tasks = Task::title($title)->orderBy('is_completed', 'asc')->orderBy('created_at', 'desc')->get();

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
    
    public function setHasComplete(Task $task)
    {
        $task->is_completed = !$task->is_completed;

        $taskStatus = $task->is_completed ? 'checked' : 'unchecked';

        $task->save();

        return redirect()->back()->with('message', 'The task has been '. $taskStatus .'!');
    }

    public function setPinned(Task $task)
    {
        $task->is_pinned = !$task->is_pinned;

        $taskStatus = $task->is_pinned ? 'pinned' : 'unpinned';

        $task->save();

        return redirect()->back()->with('message', 'The task has been '. $taskStatus .'!');
    }
}
