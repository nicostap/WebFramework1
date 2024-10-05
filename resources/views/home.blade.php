@extends('base.base')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-6">Events in Surabaya</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @if ($events->count() == 0)
            <div class="w-full h-full items-center">
                <h4 class="text-2xl text-gray-600 font-extrabold mb-3">No Events</h4>
            </div>
        @endif
        @foreach ($events as $event)
            <div class="bg-white shadow-md rounded-lg p-4">
                <div class="h-48 bg-gray-300 rounded mb-4">
                    <img src="{{ asset('images/default_event.png') }}" alt="Event Image">
                </div>
                <div class="text-lg font-semibold">{{ $event->title }}</div>
                <div class="text-gray-600">
                    <p>
                        <strong>
                            {{ \Carbon\Carbon::parse($event->date)->format('D, M d Y') }} -
                            {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}
                        </strong>
                    </p>
                    <p>{{ $event->venue }}</p>
                    <p>{{ $event->price ? $event->price : 'Free' }}</p>
                    <p>Organizer: {{ $event->organizer->name }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection