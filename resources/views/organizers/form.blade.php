@extends('base.base')

@section('content')
<h2 class="text-xl font-semibold mb-6">Organizer</h2>

<form action="{{ isset($organizer) ? route('organizers.update', $organizer->id) : route('organizers.store') }}"
    method="POST">
    @csrf
    @if(isset($organizer))
        @method('PUT')
    @endif
    <div class="mb-4">
        <label for="name" class="block text-gray-700">Organizer Name</label>
        <input type="text" name="name" id="name" value="{{ $organizer->name ?? '' }}"
            class="border border-gray-300 rounded w-full p-2" required>
    </div>

    @if(isset($organizer))
        <div class="mb-8">
            <label class="inline-flex items-center cursor-pointer">
                <input type="hidden" name="active" value="0">
                <input type="checkbox" name="active" value="1" class="sr-only peer" {{ $organizer->active == 1 ? 'checked' : '' }}>
                <div
                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
                <span class="ml-2 text-gray-700">Active</span>
            </label>
        </div>
    @endif

    <div class="grid grid-cols-2 mb-4 gap-5">
        <div>
            <label for="facebook_link" class="block text-gray-700">Facebook</label>
            <input type="text" name="facebook_link" id="facebook_link" value="{{ $organizer->facebook_link ?? '' }}"
                class="border border-gray-300 rounded w-full p-2">
        </div>
        <div>
            <label for="x_link" class="block text-gray-700">X</label>
            <input type="text" name="x_link" id="x_link" value="{{ $organizer->x_link ?? '' }}"
                class="border border-gray-300 rounded w-full p-2">
        </div>
    </div>

    <div class="mb-4">
        <label for="website_link" class="block text-gray-700">Website</label>
        <input type="text" name="website_link" id="website_link" value="{{ $organizer->website_link ?? '' }}"
            class="border border-gray-300 rounded w-full p-2">
    </div>

    <div class="mb-4">
        <label for="description" class="block text-gray-700">About</label>
        <textarea name="description" id="description" class="border border-gray-300 rounded w-full p-2 editor"
            rows="4">{{ $organizer->description ?? '' }}</textarea>
    </div>

    <div class="flex justify-start space-x-4">
        <button type="submit"
            class="bg-green-500 text-white px-4 py-2 rounded">{{ isset($organizer) ? 'Update' : 'Save' }}</button>
        <a href="{{ route('organizers.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded ml-2">Cancel</a>
    </div>
</form>
@endsection

@section('scripts')
@vite('resources/js/tinymce.js')
@endsection