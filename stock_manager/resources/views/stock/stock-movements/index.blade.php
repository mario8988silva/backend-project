@php
$columns = [
    ['product', 'Product'],
    ['movement_type', 'Type'],
    ['quantity', 'Qty'],
    ['order', 'Order'],
    ['stock', 'Stock Entry'],
    ['moved_at', 'Moved At'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Stock Movements List'" :columns="$columns">

    <x-slot name="filters">
        <td>
            <select name="product_id">
                <option value="">-- Product --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}"
                        {{ request('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </td>

        <td>
            <select name="movement_type">
                <option value="">-- Type --</option>
                <option value="IN"  {{ request('movement_type')=='IN' ? 'selected' : '' }}>IN</option>
                <option value="OUT" {{ request('movement_type')=='OUT' ? 'selected' : '' }}>OUT</option>
                <option value="ADJUST" {{ request('movement_type')=='ADJUST' ? 'selected' : '' }}>ADJUST</option>
            </select>
        </td>

        <td></td>

        <td>
            <select name="order_id">
                <option value="">-- Order --</option>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}"
                        {{ request('order_id') == $order->id ? 'selected' : '' }}>
                        Order #{{ $order->id }}
                    </option>
                @endforeach
            </select>
        </td>

        <td></td>

        <td>
            <input type="date"
                   name="moved_from"
                   value="{{ request('moved_from') }}">
        </td>

        <td></td>
        <td></td>
    </x-slot>

    @foreach($stockMovements as $movement)
    <tr>
        <td>{{ $movement->product->name ?? '—' }}</td>

        <td>{{ $movement->movement_type }}</td>

        <td>{{ $movement->quantity }}</td>

        <td>{{ $movement->order?->id ? 'Order #' . $movement->order->id : '—' }}</td>

        <td>{{ $movement->stock?->id ? 'Stock #' . $movement->stock->id : '—' }}</td>

        <td>{{ $movement->moved_at }}</td>

        <td>{{ $movement->created_at->format('Y-m-d') }}</td>
        <td>{{ $movement->updated_at->format('Y-m-d') }}</td>

        <td>
            <form method="POST" action="{{ route('stock-movements.destroy', $movement) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('stock-movements.edit', $movement) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('stock-movements.show', $movement) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
