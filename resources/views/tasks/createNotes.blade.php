@extends('layouts.app')

@section('title', 'Add a note')

@section('content')
    <div class="flex justify-center items-center my-[50px]">
        <form class="rounded-xl shadow-lg bg-blue-200 flex flex-col gap-2 w-[750px] p-5" action="{{ route('notes.store', $task) }}"
            method="POST">
            @csrf
            <label for="Details" class="text-2xl">Note:</label>
            @error('note')
                <p>{{ $message }}</p>
            @enderror
            <textarea name="note"
                class="outline outline-gray-400 rounded transition delay-100 bg-zinc-50  focus:outline-gray-600 p-2 text-xl resize-none"
                id="" rows="8">{{ old('note') }}</textarea>
            <div class="mt-3">
                <input type="submit"
                    class="rounded w-30 bg-blue-900/75 hover:bg-blue-900 transition text-white p-2 float-right cursor-pointer"
                    value="Add">
            </div>
        </form>
    </div>
@endsection