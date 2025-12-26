@php
$columns = [
['name', 'Name'],
['description', 'Description'],
['categories', 'Categories'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Families List'" :columns="$columns">

    <x-slot name="filters">
        <td>
            <input type="text" name="name" placeholder="Name" value="{{ request('name') }}">
        </td>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </x-slot>

    @foreach($families as $family)
    <tr>
        <td>{{ $family->name }}</td>

        <td>{{ Str::limit($family->description, 40) }}</td>

        <td>{{ $family->categories->count() }}</td>

        <td>{{ $family->created_at->format('Y-m-d') }}</td>
        <td>{{ $family->updated_at->format('Y-m-d') }}</td>

        <td>
            <form method="POST" action="{{ route('families.destroy', $family) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('families.edit', $family) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('families.show', $family) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
