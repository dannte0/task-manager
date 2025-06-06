@extends('layouts.app')

@section('title', $task->title)
@section('content')
    <p>{{ $task->details }}</p>
    <p>Completed: {{ $task->is_completed ? 'Yes' : 'No' }}</p>

    <a href="{{ route('tasks.edit', $task)}}">Edit</a>
    <form action="{{ route('tasks.destroy', $task) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
@endsection