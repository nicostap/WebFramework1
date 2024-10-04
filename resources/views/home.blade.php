@extends('base.base')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-6">Events in Surabaya</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($events as $event)
        <div class="bg-white shadow-md rounded-lg p-4">
            <div class="h-48 bg-gray-300 rounded mb-4">
                <img src="{{ asset('images/default_event.png') }}" alt="Event Image">
            </div>
            <div class="text-lg font-semibold">{{ $event->title }}</div>
            <div class="text-gray-600">
                <p><strong>{{ $event->date }} - {{ $event->start_time }}</strong></p>
                <p>{{ $event->venue }}</p>
                <p>{{ $event->price ? $event->price : 'Free' }}</p>
                <p>Organizer: {{ $event->organizer->name }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection