@php
$columns = [
['product', 'Product'],
['order', 'Order'],
['status', 'Status'],
['quantity', 'Qty'],
['location', 'Location'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Stock List'" :columns="$columns">

    <x-slot name="filters">
        <td>
            <select name="product_id">
                <option value="">-- Product --</option>
                @foreach($products as $product)
                <option value="{{ $product->id }}" {{ request('product_id') == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
                @endforeach
            </select>
        </td>

        <td></td>

        <td>
            <select name="status_id">
                <option value="">-- Status --</option>
                @foreach($statuses as $status)
                <option value="{{ $status->id }}" {{ request('status_id') == $status->id ? 'selected' : '' }}>
                    {{ $status->name }}
                </option>
                @endforeach
            </select>
        </td>

        <td></td>

        <td>
            <input type="text" name="location" placeholder="Location" value="{{ request('location') }}">
        </td>

        <td></td>
        <td></td>
    </x-slot>

    @foreach($stocks as $stock)
    <tr>
        <td>{{ $stock->product->name ?? '—' }}</td>

        <td>
            {{ $stock->orderHasProduct?->order_id
                ? 'Order #' . $stock->orderHasProduct->order_id
                : '—' }}
        </td>

        <td>{{ $stock->status->name ?? '—' }}</td>

        <td>{{ $stock->quantity }}</td>

        <td>{{ $stock->location ?? '—' }}</td>

        <td>{{ $stock->created_at->format('Y-m-d') }}</td>
        <td>{{ $stock->updated_at->format('Y-m-d') }}</td>

        <td>
            <form method="POST" action="{{ route('stocks.destroy', $stock) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('stocks.edit', $stock) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('stocks.show', $stock) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
