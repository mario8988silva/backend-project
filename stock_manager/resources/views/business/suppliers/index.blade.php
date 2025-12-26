@php
$columns = [
['name', 'Name'],
['phone', 'Phone'],
['email', 'Email'],
['categories', 'Categories'],
['representatives', 'Reps'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Suppliers List'" :columns="$columns">

    <x-slot name="filters">
        <td>
            <input type="text" name="name" placeholder="Name" value="{{ request('name') }}">
        </td>

        <td></td>

        <td>
            <input type="text" name="email" placeholder="Email" value="{{ request('email') }}">
        </td>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </x-slot>

    @foreach($suppliers as $supplier)
    <tr>
        <td>{{ $supplier->name }}</td>

        <td>{{ $supplier->phone ?? '—' }}</td>

        <td>{{ $supplier->email ?? '—' }}</td>

        <td>{{ $supplier->categories->count() }}</td>

        <td>{{ $supplier->representatives->count() }}</td>

        <td>{{ $supplier->created_at->format('Y-m-d') }}</td>
        <td>{{ $supplier->updated_at->format('Y-m-d') }}</td>

        <td>
            <form method="POST" action="{{ route('suppliers.destroy', $supplier) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('suppliers.edit', $supplier) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('suppliers.show', $supplier) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
