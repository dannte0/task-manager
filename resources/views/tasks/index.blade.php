@extends('layouts.app')

@section('title', 'My tasks')

@section('content')
    @forelse ($tasks as $task)
        <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
        @empty
        No tasks avaliable.
        @endforelse

        <a href="{{ route('tasks.create') }}">+ Add a new task</a>
@endsection