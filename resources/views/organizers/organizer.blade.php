@extends('base.base')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <div class="w-full md:w-1/3 mb-10">
        <h2 class="text-2xl font-semibold">{{ $organizer->name }}</h2>
        <img src="{{ asset('images/default_event.png') }}" alt="{{ $organizer->name }}"
            class="w-full h-64 object-cover rounded-lg mb-5">
        <div class="flex items-center space-x-4 mb-4">
            <a href="{{ route('organizers.edit', $organizer->id) }}" class="text-yellow-500 hover:text-yellow-700">
                <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('organizers.destroy', $organizer->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
        <div class="grid grid-cols-2 mb-4">
            <p><strong>Facebook</strong></p>
            <a href="{{ $organizer->facebook_link ?? '#' }}"
                class="text-blue-600 hover:underline">{{ $organizer->facebook_link ?? 'No link available' }}</a>
        </div>
        <div class="grid grid-cols-2 mb-4">
            <p><strong>X</strong></p>
            <a href="{{ $organizer->x_link ?? '#' }}"
                class="text-blue-600 hover:underline">{{ $organizer->x_link ?? 'No link available' }}</a>
        </div>
        <div class="grid grid-cols-2">
            <p><strong>Website</strong></p>
            <a href="{{ $organizer->website_link ?? '#' }}"
                class="text-blue-600 hover:underline">{{ $organizer->website_link ?? 'No link available' }}</a>
        </div>
    </div>

    <h3 class="font-bold mb-2">About</h3>
    <p class="text-gray-700">{!! $organizer->description !!}</p>
</div>
@endsection