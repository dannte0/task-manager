@extends('layouts.app')

@section('title', 'My tasks')

@section('content')
    <div x-data="{ open: false }" class="flex flex-col gap-2 items-center w-full h-screen mt-[50px]">
        <div class="flex justify-center items-center">
            <ul
                class="list-disc list-inside rounded flex flex-col bg-blue-200 items-center rounded w-[600px] shadow-lg">
                @forelse ($tasks as $task)
                    <a href="{{ route('tasks.show', $task) }}"
                        class="{{ $task->is_completed ? 'line-through decoration-2' : '' }} p-3 text-start text-xl hover:bg-blue-900/20 hover:rounded hover:text-gray-100 w-full relative">
                        <li>
                            {{ $task->title }}
                            <p class="absolute text-base right-2 bottom-4 text-gray-500"> {{ $task->created_at->format('m/d/Y') }}
                            </p>
                        </li>
                    </a>
                @empty
                    No tasks avaliable.
                @endforelse

            </ul>

        </div>
        <div class="flex">
            <a href="{{ route('tasks.create') }}" class="text-blue-500 hover:text-blue-700">+ Add a new task</a>
        </div>

    </div>
<s @endsection
