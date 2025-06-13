@extends('layouts.app')

@section('title', 'My tasks')

@section('content')
    <div class="flex flex-col gap-2 items-center w-full h-screen mt-[50px]">
        <div class="flex justify-center items-center">
            <ul class="rounded flex flex-col bg-blue-200 items-center rounded w-[600px] shadow-lg">
                <form action="{{ route('tasks.index') }}" method="GET" class=" my-3 flex space-x-4">
                    <input type="text"
                        class="outline outline-gray-400 rounded transition delay-100 bg-zinc-50 focus:outline-gray-600 p-2 text-base hover:bg-zinc-200 focus:bg-zinc-200 transition duration-300 shadow-lg"
                        name="search" placeholder="Search by the task">
                    <button type="submit"
                        class="cursor-pointer py-2 px-3 rounded-lg bg-blue-900/75 transition duration-300 hover:ease-in-out hover:transition hover:bg-blue-900/85 text-zinc-50 shadow-lg">Search</button>
                    @if (request()->input('search'))
                        <a href="{{ route('index') }}"
                            class="cursor-pointer py-2 px-3 rounded-lg text-zinc-900 bg-zinc-50 transition duration-300 hover:bg-zinc-300">Clear</a>
                    @endif
                </form>
                @if ($tasks->where('is_pinned', true)->isNotEmpty())
                    <h1 class="text-xl mb-2 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-pin-icon lucide-pin flex justify-center items-center">
                            <path fill="currentColor" d="M12 17v5" />
                            <path fill="currentColor"
                                d="M9 10.76a2 2 0 0 1-1.11 1.79l-1.78.9A2 2 0 0 0 5 15.24V16a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-.76a2 2 0 0 0-1.11-1.79l-1.78-.9A2 2 0 0 1 15 10.76V7a1 1 0 0 1 1-1 2 2 0 0 0 0-4H8a2 2 0 0 0 0 4 1 1 0 0 1 1 1z" />
                        </svg>
                        Pinned tasks:
                    </h1>
                    @foreach ($tasks->where('is_pinned', true) as $task)
                        <a href="{{ route('tasks.show', $task) }}"
                            class="group {{ $task->is_completed ? 'line-through decoration-2' : '' }} p-4 text-start text-xl hover:bg-blue-900/20 transition duration-300 hover:rounded hover:text-gray-100 w-full relative">
                            <li>
                                {{ $task->title }}
                                <p
                                    class="absolute text-base right-3 {{ $task->notes->count() ? 'bottom-7' : 'bottom-4' }} text-gray-500 group-hover:text-gray-100">
                                    {{ $task->updated_at->format('m/d/Y H:i') }}
                                </p>
                                @if ($task->notes->count())
                                    <p class="absolute text-base right-3 bottom-1 text-gray-600 group-hover:text-gray-100">
                                        Notes: {{ $task->notes->count() }}
                                    </p>
                                @endif
                            </li>
                        </a>
                    @endforeach
                @endif
                <h1 class="text-lg my-2">{{$tasks->where('is_pinned', true)->isNotEmpty() ? 'Other tasks': 'Tasks'}}:</h1>
                @forelse ($tasks->where('is_pinned', false) as $task)
                    <a href="{{ route('tasks.show', $task) }}"
                        class="group {{ $task->is_completed ? 'line-through decoration-2' : '' }} p-4    text-start text-lg hover:bg-blue-900/20 transition duration-300 hover:rounded hover:text-gray-100 w-full relative">
                        <li>
                            {{ $task->title }}
                            <p
                                class="absolute text-base right-3 {{ $task->notes->count() ? 'bottom-7' : 'bottom-4' }} text-gray-500 group-hover:text-gray-100">
                                {{ $task->updated_at->format('m/d/Y H:i') }}
                            </p>
                            @if ($task->notes->count())
                                <p class="absolute text-base right-3 bottom-1 text-gray-600 group-hover:text-gray-100">
                                    Notes: {{ $task->notes->count() }}
                                </p>
                            @endif
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
            <a href="{{ route('tasks.create') }}" class="text-blue-500 hover:text-blue-700 transition duration-300">+ Add a
                new task</a>
        </div>

    </div>
@endsection
