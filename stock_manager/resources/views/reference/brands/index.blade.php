@php
$columns = [
    ['name', 'Name'],
    ['country', 'Country'],
    ['description', 'Description'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Brands List'" :columns="$columns">

    <x-slot name="filters">
        <td><input type="text" name="name" placeholder="Name" value="{{ request('name') }}"></td>
        <td><input type="text" name="country" placeholder="Country" value="{{ request('country') }}"></td>
        <td></td>
        <td></td>
        <td></td>
    </x-slot>

    @foreach($brands as $brand)
    <tr>
        <td>{{ $brand->name }}</td>
        <td>{{ $brand->country ?? '—' }}</td>
        <td>{{ Str::limit($brand->description, 40) }}</td>
        <td>{{ $brand->created_at->format('Y-m-d') }}</td>
        <td>{{ $brand->updated_at->format('Y-m-d') }}</td>

        <td>
            <form method="POST" action="{{ route('brands.destroy', $brand) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('brands.edit', $brand) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('brands.show', $brand) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
