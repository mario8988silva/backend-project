@php
$columns = [
['name', 'Name'],
['phone', 'Phone'],
['email', 'Email'],
['supplier', 'Supplier'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Representatives List'" :columns="$columns">

    <x-slot name="filters">
        <td>
            <input type="text" name="name" placeholder="Name" value="{{ request('name') }}">
        </td>

        <td>
            <input type="text" name="phone" placeholder="Phone" value="{{ request('phone') }}">
        </td>

        <td>
            <input type="text" name="email" placeholder="Email" value="{{ request('email') }}">
        </td>
{{--
        <td>
            <select name="supplier_id">
                <option value="">-- Supplier --</option>
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ request('supplier_id') == $supplier->id ? 'selected' : '' }}>
                    {{ $supplier->name }}
                </option>
                @endforeach
            </select>
        </td>
--}}
        <td></td>
        <td></td>
    </x-slot>

    @foreach($representatives as $rep)
    <tr>
        <td>{{ $rep->name }}</td>

        <td>{{ $rep->phone ?? '—' }}</td>

        <td>{{ $rep->email ?? '—' }}</td>

        <td>{{ $rep->supplier->name ?? '—' }}</td>

        <td>{{ $rep->created_at->format('Y-m-d') }}</td>
        <td>{{ $rep->updated_at->format('Y-m-d') }}</td>

        <td>
            <form method="POST" action="{{ route('representatives.destroy', $rep) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('representatives.edit', $rep) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('representatives.show', $rep) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
