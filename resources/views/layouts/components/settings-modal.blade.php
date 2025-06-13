    <div x-show="settings" @click="settings = false" x-transition
        class="fixed inset-0 bg-black/45 flex items-center justify-center z-50" style="display: none;">
        <div class="bg-white rounded p-5 max-w-md w-full max-h-35 relative shadow-xl" @click.stop>
            <div class="mb-5 flex justify-between">
                <h4 class="text-xl font-bold w-3">Settings</h4>
                <button @click="settings = false" class="cursor-pointer text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-row justify-center items-center max-w-md space-x-2">
                <a href="{{ route('tasks.edit', $task) }}"
                    class="rounded transition border-1 border-blue-700 text-blue-700 p-2 cursor-pointer hover:bg-blue-700 hover:transition hover:text-white transition duration-300 flex gap-3 w-20 h-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                    Edit
                </a>
                <form action="{{ route('tasks.destroy', $task) }}" method="post" class="flex items-center">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="rounded flex gap-3 transition border-1 border-red-700 text-red-700 p-2 cursor-pointer hover:bg-red-700 hover:transition hover:text-white transition duration-300 w-25 h-10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                        Delete
                        <button>
                </form>
            </div>
        </div>
    </div>
