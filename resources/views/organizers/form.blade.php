@extends('base.base')

@section('content')
<h2 class="text-xl font-semibold mb-6">Organizer</h2>

<form action="{{ isset($organizer) ? route('organizers.update', $organizer->id) : route('organizers.store') }}"
    method="POST">
    @csrf
    @if(isset($organizer))
        @method('PUT')
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 mb-4 gap-5">
        <div>
            <label for="name" class="block text-gray-700">Organizer Name</label>
            <input type="text" name="name" id="name" value="{{ $organizer->name ?? '' }}"
                class="border border-gray-300 rounded w-full p-2" required>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 mb-4 gap-5">
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

    <div class="grid grid-cols-1 md:grid-cols-2 mb-4 gap-5">
        <div>
            <label for="website_link" class="block text-gray-700">Website</label>
            <input type="text" name="website_link" id="website_link" value="{{ $organizer->website_link ?? '' }}"
                class="border border-gray-300 rounded w-full p-2">
        </div>
    </div>

    <div class="mb-4 w-full md:w-3/4">
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