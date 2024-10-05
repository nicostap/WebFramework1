@extends('base.base')

@section('content')
<h2 class="text-2xl font-semibold mb-6">Events</h2>

<form action="{{ isset($event) ? route('events.update', $event->id) : route('events.store') }}" method="POST">
    @csrf
    @if(isset($event))
        @method('PUT')
    @endif

    <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label for="title" class="block text-gray-700">Event Name</label>
            <input type="text" name="title" id="title" value="{{ $event->title ?? '' }}"
                class="border border-gray-300 rounded w-full p-2" required>
        </div>
        <div>
            <label for="date" class="block text-gray-700">Date</label>
            <input type="date" name="date" id="date" value="{{ isset($event) ? $event->date->format('Y-m-d') : '' }}"
                class="border border-gray-300 rounded w-full p-2" required>
        </div>
    </div>

    <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label for="venue" class="block text-gray-700">Location</label>
            <input type="text" name="venue" id="venue" value="{{ $event->venue ?? '' }}"
                class="border border-gray-300 rounded w-full p-2" required>
        </div>
        <div>
            <label for="start_time" class="block text-gray-700">Start Time</label>
            <input type="time" name="start_time" id="date"
                value="{{ isset($event) ? \Carbon\Carbon::parse($event->start_time)->format('H:m') : ''}}"
                class="border border-gray-300 rounded w-full p-2" required>
        </div>
    </div>

    <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label for="organizer_id" class="block text-gray-700">Organizer</label>
            <select name="organizer_id" id="organizer_id" class="border border-gray-300 rounded w-full p-2" required>
                <option value="">Select Organizer</option>
                @foreach($organizers as $organizer)
                    <option value="{{ $organizer->id }}" {{ (isset($event) && $event->organizer_id == $organizer->id) ? 'selected' : '' }}>
                        {{ $organizer->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="event_category_id" class="block text-gray-700">Category</label>
            <select name="event_category_id" id="event_category_id" class="border border-gray-300 rounded w-full p-2"
                required>
                <option value="">Select Category</option>
                @foreach($event_categories as $event_category)
                    <option value="{{ $event_category->id }}" {{ (isset($event) && $event->event_category_id == $event_category->id) ? 'selected' : '' }}>
                        {{ $event_category->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 mb-4 gap-5">
        <div>
            <label for="booking_url" class="block text-gray-700">Booking URL</label>
            <input type="text" name="booking_url" id="booking_url" value="{{ $event->booking_url ?? '' }}"
                class="border border-gray-300 rounded w-full p-2">
        </div>
    </div>

    <div class="mb-4 w-full md:w-3/4">
        <label for="description" class="block text-gray-700">About</label>
        <textarea name="description" id="description" class="border border-gray-300 rounded w-full p-2 editor"
            rows="6">{{ $event->description ?? '' }}</textarea>
    </div>

    <div class="mb-4 w-full md:w-3/4">
        <label for="tags" class="block text-gray-700">Tags</label>
        <div id="tags-container" class="flex flex-wrap border border-gray-300 rounded p-2 gap-3">
            <input type="text" id="tags-input" class="flex-grow p-1 text-gray border-none h-6" placeholder="Enter tags">
        </div>
        <input type="hidden" name="tags" id="tags-hidden-input" value="{{ $event->tags ?? '' }}">
    </div>

    <div class="flex justify-start space-x-4">
        <button type="submit"
            class="bg-green-500 text-white px-4 py-2 rounded">{{ isset($event) ? 'Update' : 'Save' }}</button>
        <a href="{{ route('events.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Cancel</a>
    </div>
</form>
@endsection

@section('scripts')
@vite('resources/js/tinymce.js')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tagsContainer = document.getElementById('tags-container');
        const tagsInput = document.getElementById('tags-input');
        const tagsHiddenInput = document.getElementById('tags-hidden-input');

        let tagsArray = tagsHiddenInput.value ? tagsHiddenInput.value.split(',') : [];

        for (tag of tagsArray) {
            insertTagToView(tag);
        }

        function addTag(tag) {
            if (!tagsArray.includes(tag) && tag.trim() !== "") {
                tagsArray.push(tag);
                insertTagToView(tag);
                updateHiddenInput();
            }
        }

        function insertTagToView(tag) {
            const tagElement = document.createElement('span');
            tagElement.className = 'flex items-center bg-blue-500 text-white text-sm font-medium py-1 px-2 rounded-full h-6';
            tagElement.innerHTML = `
                        ${tag}
                        <button type="button" class="ml-2 text-xs" onclick="removeTag(this, '${tag}')">&times;</button>
                    `;
            tagsContainer.insertBefore(tagElement, tagsInput);
        }

        function updateHiddenInput() {
            tagsHiddenInput.value = tagsArray.join(',');
        }

        window.removeTag = function (button, tag) {
            tagsArray = tagsArray.filter(t => t !== tag);
            button.parentElement.remove();
            updateHiddenInput();
        };

        tagsInput.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ',') {
                event.preventDefault();
                const tag = tagsInput.value.trim();
                addTag(tag);
                tagsInput.value = '';
            }
        });
    });
</script>
@endsection