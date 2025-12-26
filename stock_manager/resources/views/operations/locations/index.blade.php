@php
$columns = [
['name', 'Name'],
['address', 'Address'],
['type', 'Type'],
['stocks', 'Stock Count'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Locations List'" :columns="$columns">

    <x-slot name="filters">
        <td>
            <input type="text" name="name" placeholder="Name" value="{{ request('name') }}">
        </td>

        <td>
            <input type="text" name="address" placeholder="Address" value="{{ request('address') }}">
        </td>

        <td>
            <input type="text" name="type" placeholder="Type" value="{{ request('type') }}">
        </td>

        <td></td>
        <td></td>
        <td></td>
    </x-slot>

    @foreach($locations as $location)
    <tr>
        <td>{{ $location->name }}</td>

        <td>{{ $location->address ?? '—' }}</td>

        <td>{{ $location->type ?? '—' }}</td>

        <td>{{ $location->stocks->count() }}</td>

        <td>{{ $location->created_at->format('Y-m-d') }}</td>
        <td>{{ $location->updated_at->format('Y-m-d') }}</td>

        <td>
            <form method="POST" action="{{ route('locations.destroy', $location) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('locations.edit', $location) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('locations.show', $location) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
