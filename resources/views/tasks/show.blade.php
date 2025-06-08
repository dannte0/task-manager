@extends('layouts.app')

@section('title', $task->title)
@section('content')
    <div class="gap-7 flex flex-col">
        <div class="flex flex-col items-center items-center mt-[50px]">
            <div class="rounded-xl bg-blue-100 shadow-lg p-4 w-[500px]">
                <div class="flex flex-col gap-2 py-3">
                    <div>
                        <p class="flex gap-1 text-gray-600 float-end">
                            {{ $task->created_at->format('M/d/Y') }}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                            </svg>
                        </p>
                    </div>
                    <p class="block">{{ $task->details }}</p>
                    <div class="flex gap-2 {{ $task->is_completed ? 'text-blue-700' : 'text-red-700' }}">
                        <p>Completed:
                            {{ $task->is_completed ? 'Yes' : 'No' }}
                        </p>
                        <form action="{{ route('check.task', $task) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button type="submit"
                                class="rounded border-1 {{ $task->is_completed ? 'border-blue-700 bg-blue-700 text-white' : 'border-red-700 bg-red-700 text-white' }} cursor-pointer"
                                name="completed" id="">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="{{ $task->is_completed ? 'm4.5 12.75 6 6 9-13.5' : 'M6 18 18 6M6 6l12 12' }}" />
                                </svg>
                            </button>
                        </form>
                    </div>

                </div>
                <div class="flex gap-3 justify-center">
                    <a href="{{ route('tasks.edit', $task) }}"
                        class="rounded transition border-1 border-blue-700 text-blue-700 p-2 cursor-pointer hover:bg-blue-700 hover:transition hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>

                    </a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="rounded transition border-1 border-red-700 text-red-700 p-2 cursor-pointer hover:bg-red-700 hover:transition hover:text-white"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            <button>
                    </form>
                </div>
            </div>
        </div>
        <div class="inline-block text-center text-xl">
            @if ($task->notes->count())
                My notes
            @endif
        </div>
        <div class="flex flex-row flex-wrap items-center justify-center gap-5 mx-[500px]">
            @forelse ($task->notes as $note)
                <div class="flex basis-1/4 rounded-xl items-center justify-center bg-slate-300 p-4 h-[150px] w-[100px] shadow-lg">
                    <p>{{ $note->note }}</p>
                </div>
            @empty
                <a href="{{ route('notes.create', $task) }}" class="text-blue-500 hover:text-blue-700">Wish add notes about to the task?</a>
            @endforelse
            @if ($task->notes->count())
            <a href="{{ route('notes.create', $task) }}">
            <div class="w-full flex gap-2 rounded-xl bg-blue-100 items-center justify-center h-[100px] text-base w-[200px] shadow-lg text-blue-500 hover:text-blue-700 p-3">
                        Wish add more notes?
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                </a>
            @endif
        </div>
    </div>

@endsection
