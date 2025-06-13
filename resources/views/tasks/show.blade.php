@extends('layouts.app')

@section('title', $task->title)
@section('content')
    <div class="gap-7 flex flex-col">
        <div class="flex flex-col items-center items-center mt-[50px]">
            <div x-data="{ settings: false }" class="rounded-xl bg-blue-100 shadow-lg p-4 w-[500px]">

                @include('layouts.components.settings-modal')
                <div class="flex flex-col gap-2 py-3">
                    <div>
                        <div class="flex text-gray-600 justify-between">
                            <div class="flex space-x-4 gap-1">
                                {{ $task->updated_at->format('M/d/Y') }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                                </svg>
                                {{ $task->updated_at->format('H:i') }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <div class="flex items-center space-x-2">
                                <form action="{{ route('pin.task', $task) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" class="cursor-pointer flex items-center justify-center"
                                        name="pinned" id="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-pin-icon lucide-pin  {{ $task->is_pinned ? 'text-gray-500 fill-current' : 'text-gray-500' }}"">
                                            @if ($task->is_pinned)
                                                <path fill="currentColor" d="M12 17v5" />
                                                <path fill="currentColor"
                                                    d="M9 10.76a2 2 0 0 1-1.11 1.79l-1.78.9A2 2 0 0 0 5 15.24V16a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-.76a2 2 0 0 0-1.11-1.79l-1.78-.9A2 2 0 0 1 15 10.76V7a1 1 0 0 1 1-1 2 2 0 0 0 0-4H8a2 2 0 0 0 0 4 1 1 0 0 1 1 1z" />
                                            @else
                                                <path d="M12 17v5" />
                                                <path
                                                    d="M9 10.76a2 2 0 0 1-1.11 1.79l-1.78.9A2 2 0 0 0 5 15.24V16a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-.76a2 2 0 0 0-1.11-1.79l-1.78-.9A2 2 0 0 1 15 10.76V7a1 1 0 0 1 1-1 2 2 0 0 0 0-4H8a2 2 0 0 0 0 4 1 1 0 0 1 1 1z" />
                                            @endif
                                        </svg>

                                    </button>
                                </form>
                                <button @click="settings = !settings"
                                    class="cursor-pointer flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6">
                                        <path fill-rule="evenodd"
                                            d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>
                    <p class="block whitespace-pre-line my-5">{{ $task->details }}</p>
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

            </div>
        </div>
        <div class="inline-block text-center text-xl">
            @if ($task->notes->count())
                My notes
            @endif
        </div>
      @include('layouts.components.card-notes')

    </div>

@endsection
