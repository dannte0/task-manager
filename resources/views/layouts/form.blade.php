@extends('layouts.app')

@section('title', isset($task) ? 'Edit: ' . $task->title : 'Add a new task')

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}" method="POST">
        @isset($task)
            @method('PUT')
        @endisset
        @csrf
        <label for="Title">Title:</label>
        @error('title')
            <p>{{ $message }}</p>
        @enderror
        <input type="text" name="title" id="" value="{{ $task->title ?? old('title') }}">
        <label for="Details">Details:</label>
        @error('title')
            <p>{{ $message }}</p>
        @enderror
        <textarea name="details" id="" cols="30" rows="10">{{ $task->details ?? old('details') }}</textarea>
        <input type="submit" value="{{ isset($task) ? 'Update' : 'Create' }}">
    </form>
@endsection
