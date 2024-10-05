@extends('base.base')

@section('content')
<div class="mb-5">
    <h1 class="font-bold inline text-2xl">
        Event Categories&nbsp;
        <a href="{{ route('event_categories.create') }}" class="bg-blue-500 text-white text-xl px-4 py-2 rounded">
            +Create
        </a>
    </h1>
</div>

<table id="table" class="display">
    <thead>
        <tr>
            <th>No</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $key => $category)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    <a href="{{ route('event_categories.show', $category->id) }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        {{ $category->name }}
                    </a>
                </td>
                <td class="flex justify-around">
                    <a href="{{ route('event_categories.edit', $category->id) }}"
                        class="text-yellow-500 hover:text-yellow-700"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('event_categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection