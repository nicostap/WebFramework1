@extends('base.base')

@section('content')
<div class="mb-5">
    <h1 class="font-bold inline text-2xl">
        Events&nbsp
        <a href="{{ route('events.create') }}" class="bg-blue-500 text-white text-xl px-4 py-2 rounded">
            +Create
        </a>
    </h1>
</div>

<table id="table" class="display">
    <thead>
        <tr>
            <th>No</th>
            <th>Event Name</th>
            <th>Date</th>
            <th>Category</th>
            <th>Location</th>
            <th>Organizer</th>
            <th>About</th>
            <th>Tags</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $key => $event)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <a href="{{ route('events.show', $event->id) }}">
                            {{ $event->title }}
                        </a>
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($event->date)->format('D, M d Y') }}
                        {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}
                    </td>
                    <td>{{ $event->eventCategory->name }}</td>
                    <td>{{ $event->venue }}</td>
                    <td>{{ $event->organizer->name }}</td>
                    <td>{{ Str::limit($event->description, 50) }}</td>
                    <td class="flex flex-wrap gap-1">
                        @php
                            $tags = explode(',', $event->tags);
                        @endphp
                        @foreach($tags as $tag)
                            <button class="bg-blue-500 text-white font-semibold py-1 px-3 rounded hover:bg-blue-600">
                                {{ trim($tag) }}
                            </button>
                        @endforeach
                    </td>
                    <td>
                        <div class="flex justify-around">
                            <a href="{{ route('events.edit', $event->id) }}" class="text-yellow-500 hover:text-yellow-700"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
        @endforeach
    </tbody>
</table>
@endsection