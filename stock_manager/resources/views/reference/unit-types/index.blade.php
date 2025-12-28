@php
$columns = [
    ['name', 'Name'],
    ['symbol', 'Symbol'],
    ['description', 'Description'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Unit-Types List'" :columns="$columns">

    <x-slot name="filters">
        <td><input type="text" name="name" placeholder="Name" value="{{ request('name') }}"></td>
        <td><input type="text" name="symbol" placeholder="symbol" value="{{ request('symbol') }}"></td>
        <td><input type="text" name="description" placeholder="description" value="{{ request('description') }}"></td>
        <td></td>
        <td></td>
        <td></td>
    </x-slot>

    @foreach($unit_types as $unit_type)
    <tr>
        <td>{{ $unit_type->name }}</td>
        <td>{{ $unit_type->country ?? '—' }}</td>
        <td>{{ Str::limit($unit_type->description, 40) }}</td>


        <td>
            <form method="POST" action="{{ route('unit-types.destroy', $unit_type) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('unit-types.edit', $unit_type) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('unit-types.show', $unit_type) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
