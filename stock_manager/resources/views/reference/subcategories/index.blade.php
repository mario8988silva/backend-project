@php
$columns = [
    ['name', 'Name'],
    ['category', 'Category'],
    ['family', 'Family'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Subcategories List'" :columns="$columns">

    <x-slot name="filters">
        <td>
            <input type="text"
                   name="name"
                   placeholder="Name"
                   value="{{ request('name') }}">
        </td>

        <td>
            <select name="category_id">
                <option value="">-- Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </td>

        <td></td>
        <td></td>
        <td></td>
    </x-slot>

    @foreach($subcategories as $subcategory)
    <tr>
        <td>{{ $subcategory->name }}</td>

        <td>{{ $subcategory->category->name ?? '—' }}</td>

        <td>{{ $subcategory->category->family->name ?? '—' }}</td>

        <td>{{ $subcategory->created_at->format('Y-m-d') }}</td>
        <td>{{ $subcategory->updated_at->format('Y-m-d') }}</td>

        <td>
            <form method="POST" action="{{ route('subcategories.destroy', $subcategory) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('subcategories.edit', $subcategory) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('subcategories.show', $subcategory) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
