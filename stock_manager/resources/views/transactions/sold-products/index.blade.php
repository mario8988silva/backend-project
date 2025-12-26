@php
$columns = [
['product', 'Product'],
['order', 'Order'],
['quantity', 'Qty'],
['price', 'Price'],
['total', 'Total'],
['sold_at', 'Sold At'],
['location', 'Location'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Sold Products List'" :columns="$columns">

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

        <td>
            <select name="order_id">
                <option value="">-- Order --</option>
                @foreach($orders as $order)
                <option value="{{ $order->id }}" {{ request('order_id') == $order->id ? 'selected' : '' }}>
                    Order #{{ $order->id }}
                </option>
                @endforeach
            </select>
        </td>

        <td></td>
        <td></td>
        <td></td>

        <td>
            <input type="date" name="sold_from" value="{{ request('sold_from') }}">
        </td>

        <td>
            <input type="text" name="location" placeholder="Location" value="{{ request('location') }}">
        </td>

        <td></td>
        <td></td>
    </x-slot>

    @foreach($soldProducts as $sold)
    <tr>
        <td>{{ $sold->product->name ?? '—' }}</td>

        <td>{{ $sold->order->id ?? '—' }}</td>

        <td>{{ $sold->quantity }}</td>

        <td>{{ number_format($sold->price, 2) }}</td>

        <td>{{ number_format($sold->total, 2) }}</td>

        <td>{{ $sold->sold_at }}</td>

        <td>{{ $sold->location ?? '—' }}</td>

        <td>{{ $sold->created_at->format('Y-m-d') }}</td>
        <td>{{ $sold->updated_at->format('Y-m-d') }}</td>

        <td>
            <form method="POST" action="{{ route('sold-products.destroy', $sold) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('sold-products.edit', $sold) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('sold-products.show', $sold) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
