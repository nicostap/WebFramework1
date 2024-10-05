@extends('base.base')

@section('content')
<div class="mb-5">
    <h1 class="font-bold inline text-2xl">
        Events&nbsp
        <a href="{{ route('events.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+
            Create</a>
    </h1>
</div>

<table class="min-w-full border-collapse border border-gray-200">
    <thead>
        <tr>
            <th class="border px-4 py-2">No</th>
            <th class="border px-4 py-2">Event Title</th>
            <th class="border px-4 py-2">Category</th>
            <th class="border px-4 py-2">Location</th>
            <th class="border px-4 py-2">Organizer</th>
            <th class="border px-4 py-2">About</th>
            <th class="border px-4 py-2">Date</th>
            <th class="border px-4 py-2">Tags</th>
            <th class="border px-4 py-2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $key => $event)
                <tr>
                    <td class="border px-4 py-2">{{ $key + 1 }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('events.show', $event->id) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            {{ $event->title }}
                        </a>
                    </td>
                    <td class="border px-4 py-2">{{ $event->eventCategory->name }}</td>
                    <td class="border px-4 py-2">{{ $event->venue }}</td>
                    <td class="border px-4 py-2">{{ $event->organizer->name }}</td>
                    <td class="border px-4 py-2">{{ Str::limit($event->description, 50) }}</td>
                    <td class="border px-4 py-2">{{ $event->date->format('Y-m-d') }}</td>
                    <td class="border px-4 py-2 flex flex-wrap gap-3">
                        <div class="flex flex-wrap gap-3">
                            @php
                                $tags = explode(',', $event->tags);
                            @endphp
                            @foreach($tags as $tag)
                                <button class="bg-blue-500 text-white font-semibold py-1 px-3 rounded hover:bg-blue-600">
                                    {{ trim($tag) }}
                                </button>
                            @endforeach
                        </div>
                    </td>
                    <td class="border px-4 py-2">
                        <div class="flex justify-around">
                            <a href="{{ route('events.edit', $event->id) }}" class="text-yellow-500 hover:text-yellow-700"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
        @endforeach
    </tbody>
</table>
@endsection