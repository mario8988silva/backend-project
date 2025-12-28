@php
$columns = [
    ['name', 'Name'],
    ['rate', 'Rate'],
    ['description', 'Description'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];
@endphp

<x-index :title="'IVA Categories List'" :columns="$columns">

    <x-slot name="filters">
        <td><input type="text" name="name" placeholder="Name" value="{{ request('name') }}"></td>
        <td><input type="text" name="rate" placeholder="rate" value="{{ request('rate') }}"></td>
        <td><input type="text" name="description" placeholder="description" value="{{ request('description') }}"></td>
        <td></td>
        <td></td>
        <td></td>
    </x-slot>

    @foreach($iva_categories as $iva_category)
    <tr>
        <td>{{ $iva_category->name }}</td>
        <td>{{ $iva_category->rate ?? '—' }}</td>
        <td>{{ Str::limit($iva_category->description, 40) }}</td>


        <td>
            <form method="POST" action="{{ route('iva-categories.destroy', $iva_category) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('iva-categories.edit', $iva_category) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('iva-categories.show', $iva_category) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
