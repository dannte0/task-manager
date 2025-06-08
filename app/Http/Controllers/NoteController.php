<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Task;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function create(Task $task)
    {
        return view('notes.create', ['task' => $task]);
    }

    public function store(Request $request, Task $task)
    {
        $note = new Note();

        $note->note = $request->note;

        $task->notes()->save($note);

        return redirect()->route('tasks.show', $note->task)->with('message', 'The note has been added at the task!');
    }

    public function edit(Task $task, Note $note)
    {
        return view('notes.edit', ['task' => $task, 'note' => $note]);
    }
    
    public function update(Request $request, Note $note)
    {
        $note->update($request->all()); 

        return redirect()->route('tasks.show', $note->task)->with('message', 'The note has been updated!');
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('tasks.show', $note->task)->with('message', 'The note has been deleted!');
    }
}
