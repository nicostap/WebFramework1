@extends('base.base')

@section('content')
<div class="mb-5">
    <h1 class="font-bold inline text-2xl">
        Organizer&nbsp
        <a href="{{ route('organizers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+
            Create</a>
    </h1>
</div>

<table class="min-w-full border-collapse border border-gray-200">
    <thead>
        <tr>
            <th class="border px-4 py-2">No</th>
            <th class="border px-4 py-2">Organizer Name</th>
            <th class="border px-4 py-2">About</th>
            <th class="border px-4 py-2">Active</th>
            <th class="border px-4 py-2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($organizers as $key => $organizer)
            <tr>
                <td class="border px-4 py-2">{{ $key + 1 }}</td>
                <td class="border px-4 py-2">
                    <a href="{{route('organizers.show', $organizer->id)}}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        {{ $organizer->name }}
                    </a>
                </td>
                <td class="border px-4 py-2">{{ Str::limit($organizer->description, 50) }}</td>
                <td class="border px-4 py-2">
                    {{ $organizer->active == 1 ? 'Active' : 'Inactive' }}
                </td>
                <td class="border flex justify-around px-4 py-2">
                    <a href="{{ route('organizers.edit', $organizer->id) }}"
                        class="text-yellow-500 hover:text-yellow-700"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('organizers.destroy', $organizer->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection