@extends('layouts.app')

@section('title', isset($task) ? 'Edit: ' . $task->title : 'Add a new task')

@section('content')
<div class="flex justify-center items-center my-[50px]">
    <form class="rounded-xl shadow-lg bg-blue-200 flex flex-col gap-2 w-[750px] p-5" action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}" method="POST">
        @isset($task)
            @method('PUT')
        @endisset
        @csrf
        <label for="Title" class="text-2xl">Title:</label>
        @error('title')
            <p>{{ $message }}</p>
        @enderror
        <input type="text" name="title" class="outline outline-gray-400 rounded transition delay-100 bg-zinc-50  focus:outline-gray-600 p-2 text-xl hover:bg-zinc-200 focus:bg-zinc-200 transition duration-300" id="" value="{{ $task->title ?? old('title') }}">
        <label for="Details" class="text-2xl">Details:</label>
        @error('title')
            <p>{{ $message }}</p>
        @enderror
        <textarea name="details" class="outline outline-gray-400 rounded transition delay-100 bg-zinc-50 focus:outline-gray-600 p-2 text-xl resize-none hover:bg-zinc-200 focus:bg-zinc-200 transition duration-300" id="" rows="8">{{ $task->details ?? old('details') }}</textarea>
        <div class="mt-3">
            <input type="submit" class="rounded w-30 bg-blue-900/75 hover:bg-blue-900 transition text-white p-2 float-right cursor-pointer" value="{{ isset($task) ? 'Update' : 'Create' }}">
        </div>
    </form>
</div>
@endsection
