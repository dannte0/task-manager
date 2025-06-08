<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Task;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function create(Task $task)
    {
        return view('tasks.createNotes', ['task'=> $task]);
    }

    public function store(Request $request, Task $task)
    {
        $note = new Note();

        $note->note = $request->note;

        $task->notes()->save($note);

        return redirect()->route('tasks.show', $task->id)->with('message', 'The note has been added at the task!');
    }

    public function edit(Note $note)
    {
        //
    }
    public function update(Request $request, Note $note)
    {
        //
    }

    public function destroy(Note $note)
    {
        //
    }
}
