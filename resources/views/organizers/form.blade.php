@extends('base.base')

@section('content')
<div class="mt-8">
    <h2 class="text-xl font-semibold mb-4">Event</h2>

    <form action="{{ isset($event) ? route('events.update', $event->id) : route('events.store') }}" method="POST">
        @csrf
        @if(isset($event))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="title" class="block text-gray-700">Event Title</label>
            <input type="text" name="title" id="title" value="{{ $event->title ?? '' }}" class="border border-gray-300 rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label for="venue" class="block text-gray-700">Venue</label>
            <input type="text" name="venue" id="venue" value="{{ $event->venue ?? '' }}" class="border border-gray-300 rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label for="date" class="block text-gray-700">Date</label>
            <input type="date" name="date" id="date" value="{{ isset($event) ? $event->date->format('Y-m-d') : '' }}" class="border border-gray-300 rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label for="start_time" class="block text-gray-700">Start Time</label>
            <input type="time" name="start_time" id="start_time" value="{{ isset($event) ? $event->start_time->format('H:i') : '' }}" class="border border-gray-300 rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea name="description" id="description" class="border border-gray-300 rounded w-full p-2" rows="4">{{ $event->description ?? '' }}</textarea>
        </div>

        <div class="mb-4">
            <label for="booking_url" class="block text-gray-700">Booking URL</label>
            <input type="text" name="booking_url" id="booking_url" value="{{ $event->booking_url ?? '' }}" class="border border-gray-300 rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label for="tags" class="block text-gray-700">Tags (comma separated)</label>
            <input type="text" name="tags" id="tags" value="{{ $event->tags ?? '' }}" class="border border-gray-300 rounded w-full p-2">
        </div>

        <div class="mb-4">
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

        <div class="mb-4">
            <label for="event_category_id" class="block text-gray-700">Event Category</label>
            <select name="event_category_id" id="event_category_id" class="border border-gray-300 rounded w-full p-2" required>
                <option value="">Select Category</option>
                @foreach($eventCategories as $eventCategory)
                    <option value="{{ $eventCategory->id }}" {{ (isset($event) && $event->event_category_id == $eventCategory->id) ? 'selected' : '' }}>
                        {{ $eventCategory->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">{{ isset($event) ? 'Update' : 'Save' }}</button>
            <a href="{{ route('events.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded ml-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
