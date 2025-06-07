<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-zinc-50 items-center">
    <div class="relative flex bg-blue-900/75 gap-5 p-3 items-center shadow-xl">
        @if (!request()->routeIs('index'))
            <div class="absolute left-3 flex max-w-20 items-center justify-center">
                <a href="{{ route('index') }}"
                    class="rounded items-center justify-center gap-1 flex text-base text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061A1.125 1.125 0 0 1 21 8.689v8.122ZM11.25 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061a1.125 1.125 0 0 1 1.683.977v8.122Z" />
                    </svg>
                    Back
                </a>
            </div>
        @endif

        <h1 class="text-3xl text-white mx-auto">@yield('title')</h1>
    </div>

    @session('message')
        <div x-data="{ show: true }" x-show="show"
            class="items-center justify-between rounded border border-blue-500 bg-blue-100 p-5 mt-10 w-full max-w-xl flex mx-auto">
            <p>{{ session('message') }}</p>
            <button @click="show = !show" class="cursor-pointer text-gray-600 float-end">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endsession
    @yield('content')
</body>

</html>
