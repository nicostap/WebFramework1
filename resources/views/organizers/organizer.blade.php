@extends('base.base')

@section('content')
<div class="container mx-auto mt-10">
    <div class="bg-white shadow-md rounded-lg p-6 mb-4">
        <h2 class="text-xl font-semibold">{{ $organizer->name }}</h2>
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
        
        <div class="mb-4">
            <p><strong>Facebook:</strong> <a href="{{ $organizer->facebook }}" class="text-blue-600 hover:underline">{{ $organizer->facebook }}</a></p>
            <p><strong>X:</strong> <a href="{{ $organizer->x }}" class="text-blue-600 hover:underline">{{ $organizer->x }}</a></p>
            <p><strong>Website:</strong> <a href="{{ $organizer->website }}" class="text-blue-600 hover:underline">{{ $organizer->website }}</a></p>
        </div>
        
        <h3 class="font-bold mb-2">About</h3>
        <p class="text-gray-700">{{ $organizer->description }}</p>
    </div>
</div>
@endsection
