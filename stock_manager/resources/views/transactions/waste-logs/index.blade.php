@php
$columns = [
['product', 'Product'],
['order', 'Order'],
['status', 'Status'],
['quantity', 'Qty'],
['logged_at', 'Logged At'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Waste Logs List'" :columns="$columns">

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
            <input type="date" name="logged_from" value="{{ request('logged_from') }}">
        </td>

        <td></td>
        <td></td>
    </x-slot>

    @foreach($wasteLogs as $log)
    <tr>
        <td>{{ $log->product->name ?? '—' }}</td>

        <td>{{ $log->order->id ?? '—' }}</td>

        <td>{{ $log->status->name ?? '—' }}</td>

        <td>{{ $log->quantity }}</td>

        <td>{{ $log->logged_at }}</td>

        <td>{{ $log->created_at->format('Y-m-d') }}</td>
        <td>{{ $log->updated_at->format('Y-m-d') }}</td>

        <td>
            <form method="POST" action="{{ route('waste-logs.destroy', $log) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('waste-logs.edit', $log) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('waste-logs.show', $log) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
