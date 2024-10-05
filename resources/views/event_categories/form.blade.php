@extends('base.base')

@section('content')
<h2 class="text-xl font-semibold mb-4">Event Category</h2>

<form
    action="{{ isset($category) ? route('event_categories.update', $category->id) : route('event_categories.store') }}"
    method="POST">
    @csrf
    @if(isset($category))
        @method('PUT')
    @endif
    <div class="mb-4">
        <label for="name" class="block text-gray-700">Category Name</label>
        <input type="text" name="name" id="name" value="{{ $category->name ?? '' }}"
            class="border border-gray-300 rounded w-full p-2" required>
    </div>

    <div class="grid grid-cols-2 g-5 text-center">
        <button type="submit"
            class="bg-green-500 text-white px-4 py-2 rounded">{{ isset($category) ? 'Update' : 'Save' }}</button>
        <a href="{{ route('event_categories.index') }}"
            class="bg-gray-300 text-gray-800 px-4 py-2 rounded ml-2">Cancel</a>
    </div>
</form>
@endsection