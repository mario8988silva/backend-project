@props([
    'title',
    'image' => null,
    'editRoute' => null,
    'deleteRoute' => null,
    'fields' => [],
])

<x-layout>
    <h2>{{ $title }}</h2>

    {{-- IMAGE (optional) --}}
    @if($image)
        <img src="{{ $image }}" alt="Image" width="200">
    @endif

    {{-- ACTION BUTTONS --}}
    <div style="margin: 10px 0;">
        @if($editRoute)
            <a href="{{ $editRoute }}">
                <button>Edit</button>
            </a>
        @endif

        @if($deleteRoute)
            <form action="{{ $deleteRoute }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endif
    </div>

    {{-- DETAILS --}}
    <ul>
        @foreach($fields as $label => $value)
            <li><strong>{{ $label }}:</strong> {{ $value }}</li>
        @endforeach
    </ul>

    {{-- EXTRA CONTENT (optional) --}}
    {{ $slot }}
</x-layout>
