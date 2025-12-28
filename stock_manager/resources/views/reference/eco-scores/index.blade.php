@php
$columns = [
    ['name', 'Name'],
    ['label', 'Label'],
    ['color', 'Description'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Eco Scores List'" :columns="$columns">

    <x-slot name="filters">
        <td><input type="text" name="name" placeholder="Name" value="{{ request('name') }}"></td>
        <td><input type="text" name="label" placeholder="label" value="{{ request('label') }}"></td>
        <td><input type="text" name="description" placeholder="description" value="{{ request('description') }}"></td>
        <td></td>
        <td></td>
        <td></td>
    </x-slot>

    @foreach($eco_scores as $eco_score)
    <tr>
        <td>{{ $eco_score->name }}</td>
        <td>{{ $eco_score->label ?? '—' }}</td>
        <td>{{ Str::limit($eco_score->description, 40) }}</td>


        <td>
            <form method="POST" action="{{ route('eco-scores.destroy', $eco_score) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('eco-scores.edit', $eco_score) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('eco-scores.show', $eco_score) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
