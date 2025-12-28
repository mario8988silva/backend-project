@php
$columns = [
    ['name', 'Name'],
    ['label', 'Label'],
    ['color', 'Description'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Nutri Scores List'" :columns="$columns">

    <x-slot name="filters">
        <td><input type="text" name="name" placeholder="Name" value="{{ request('name') }}"></td>
        <td><input type="text" name="label" placeholder="label" value="{{ request('label') }}"></td>
        <td><input type="text" name="description" placeholder="description" value="{{ request('description') }}"></td>
        <td></td>
        <td></td>
        <td></td>
    </x-slot>

    @foreach($nutri_scores as $nutri_score)
    <tr>
        <td>{{ $nutri_score->name }}</td>
        <td>{{ $nutri_score->label ?? '—' }}</td>
        <td>{{ Str::limit($nutri_score->description, 40) }}</td>


        <td>
            <form method="POST" action="{{ route('nutri-scores.destroy', $nutri_score) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('nutri-scores.edit', $nutri_score) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('nutri-scores.show', $nutri_score) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
