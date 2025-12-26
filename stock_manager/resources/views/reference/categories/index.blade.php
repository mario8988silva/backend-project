@php
$columns = [
['name', 'Name'],
['family', 'Family'],
['description', 'Description'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Categories List'" :columns="$columns">

    <x-slot name="filters">
        {{-- Name filter --}}
        <td>
            <input type="text" name="name" placeholder="Name" value="{{ request('name') }}">
        </td>

        {{-- Family filter --}}
        <td>
            <select name="family_id">
                <option value="">-- Family --</option>
                @foreach($families as $family)
                <option value="{{ $family->id }}" {{ request('family_id') == $family->id ? 'selected' : '' }}>
                    {{ $family->name }}
                </option>
                @endforeach
            </select>
        </td>

        <td></td>
        <td></td>
        <td></td>
    </x-slot>

    @foreach($categories as $category)
    <tr>
        <td>{{ $category->name }}</td>

        <td>{{ $category->family->name ?? '—' }}</td>

        <td>{{ Str::limit($category->description, 40) }}</td>

        <td>{{ $category->created_at->format('Y-m-d') }}</td>
        <td>{{ $category->updated_at->format('Y-m-d') }}</td>

        <td>
            <form method="POST" action="{{ route('categories.destroy', $category) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('categories.edit', $category) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('categories.show', $category) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
