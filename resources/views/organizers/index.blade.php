@extends('base.base')

@section('content')
<div class="mb-5">
    <h1 class="font-bold inline text-2xl">
        Organizer&nbsp;
        <a href="{{ route('organizers.create') }}" class="bg-blue-500 text-white text-xl px-4 py-2 rounded">
            +Create
        </a>
    </h1>
</div>

<table id="table" class="display">
    <thead>
        <tr>
            <th>No</th>
            <th>Organizer Name</th>
            <th>About</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($organizers as $key => $organizer)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    <a href="{{ route('organizers.show', $organizer->id) }}">
                        {{ $organizer->name }}
                    </a>
                </td>
                <td>{{ Str::limit($organizer->description, 100) }}</td>
                <td>
                    <div class="flex justify-around px-4 py-2">
                        <a href=" {{ route('organizers.edit', $organizer->id) }}"
                            class="text-yellow-500 hover:text-yellow-700"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('organizers.destroy', $organizer->id) }}" method="POST">
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