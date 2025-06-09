@extends('layouts.app')

@section('title', 'My tasks')

@section('content')
    <div>

    </div>
    <div class="flex flex-col gap-2 items-center w-full h-screen mt-[50px]">
        <div class="flex justify-center items-center">
            <ul class="list-disc list-inside rounded flex flex-col bg-blue-200 items-center rounded w-[600px] shadow-lg">
                <form action="{{ route('tasks.index') }}" method="GET" class=" my-3 flex space-x-4">
                    <input type="text"
                        class="outline outline-gray-400 rounded transition delay-100 bg-zinc-50 focus:outline-gray-600 p-2 text-base hover:bg-zinc-200 focus:bg-zinc-200 transition duration-300 shadow-lg"
                        name="search" placeholder="Search by the task">
                    <button type="submit" class="cursor-pointer py-2 px-3 rounded-lg bg-blue-900/75 transition duration-300 hover:ease-in-out hover:transition hover:bg-blue-900/85 text-zinc-50 shadow-lg">Search</button>
                    @if (request()->input('search'))
                        <a href="{{ route('index') }}" class="cursor-pointer py-2 px-3 rounded-lg text-zinc-900 bg-zinc-50 transition duration-300 hover:bg-zinc-300">Clear</a>
                    @endif
                </form>
                @forelse ($tasks as $task)
                    <a href="{{ route('tasks.show', $task) }}"
                        class="group {{ $task->is_completed ? 'line-through decoration-2' : '' }} p-3 text-start text-xl hover:bg-blue-900/20 transition duration-300 hover:rounded hover:text-gray-100 w-full relative">
                        <li>
                            {{ $task->title }}
                            <p class="absolute text-base right-2 bottom-4 text-gray-500 group-hover:text-gray-100">
                                {{ $task->created_at->format('m/d/Y H:i') }}
                            </p>
                        </li>
                    </a>
                @empty
                    <p class="my-3">
                        No tasks avaliable. 
                    </p>
                @endforelse

            </ul>

        </div>
        <div class="flex">
            <a href="{{ route('tasks.create') }}" class="text-blue-500 hover:text-blue-700 transition duration-300">+ Add a new task</a>
        </div>

    </div>
@endsection
