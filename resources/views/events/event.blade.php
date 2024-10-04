@extends('base.base')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h1 class="text-3xl font-bold mb-5">{{ $event->title }}</h1>
    <img src="{{ asset('images/default_event.png') }}" alt="{{ $event->title }}"
        class="w-full h-64 object-cover rounded-lg mb-5">

    <div class="grid grid-cols-2 gap-4 mb-5">
        <div>
            <h2 class="text-xl font-semibold">Organizer</h2>
            <p class="text-gray-700">{{ $event->organizer->name }}</p>
        </div>
        <div>
            <h2 class="text-xl font-semibold">Booking URL</h2>
            <a href="{{ $event->booking_url }}" target="_blank"
                class="text-blue-500 hover:underline">{{ $event->booking_url }}</a>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-5">
        <div>
            <h2 class="text-xl font-semibold">Date and Time</h2>
            <p class="text-gray-700">{{ \Carbon\Carbon::parse($event->date)->format('D, M d Y - h:i A') }}</p>
        </div>
        <div>
            <h2 class="text-xl font-semibold">Location</h2>
            <p class="text-gray-700">{{ $event->venue }}</p>
        </div>
    </div>

    <div class="mb-5">
        <h2 class="text-xl font-semibold">About This Event</h2>
        <p class="text-gray-700">{{ $event->description }}</p>
    </div>

    <div class="mb-5">
        <h2 class="text-xl font-semibold mb-2">Tags</h2>
        <div class="flex flex-wrap gap-2">
            @php
                $tags = explode(',', $event->tags);
            @endphp
            @foreach($tags as $tag)
                <button class="bg-blue-500 text-white font-semibold py-1 px-3 rounded hover:bg-blue-600">
                    {{ trim($tag) }}
                </button>
            @endforeach
        </div>
    </div>
</div>
@endsection('content')