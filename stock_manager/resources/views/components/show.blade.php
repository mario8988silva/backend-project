@props([
'title',
'image' => null,
'editRoute' => null,
'deleteRoute' => null,
'indexRoute' => null,
'fields' => [],
])

<x-layout>

    @if($indexRoute)
    <a href="{{ $indexRoute }}">← Go back to Index</a>
    @endif

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
        <x-delete-button :action="$deleteRoute" />
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
