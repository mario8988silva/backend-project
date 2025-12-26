@php
$columns = [
['representative', 'Representative'],
['user', 'User'],
['order_date', 'Order Date'],
['delivery_date', 'Delivery Date'],
['status', 'Status'],
['invoice', 'Invoice'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Orders List'" :columns="$columns">

    <x-slot name="filters">
        <td>
            <select name="representative_id">
                <option value="">-- Representative --</option>
                @foreach($representatives as $rep)
                <option value="{{ $rep->id }}" {{ request('representative_id') == $rep->id ? 'selected' : '' }}>
                    {{ $rep->name }}
                </option>
                @endforeach
            </select>
        </td>

        <td>
            <select name="user_id">
                <option value="">-- User --</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
                @endforeach
            </select>
        </td>

        <td>
            <input type="date" name="order_from" value="{{ request('order_from') }}">
        </td>

        <td>
            <input type="date" name="delivery_to" value="{{ request('delivery_to') }}">
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
        <td></td>
    </x-slot>

    @foreach($orders as $order)
    <tr>
        <td>{{ $order->representative->name ?? '—' }}</td>

        <td>{{ $order->user->name ?? '—' }}</td>

        <td>{{ $order->order_date }}</td>

        <td>{{ $order->delivery_date ?? '—' }}</td>

        <td>{{ $order->status->name ?? '—' }}</td>

        <td>{{ $order->invoice->number ?? '—' }}</td>

        <td>{{ $order->created_at->format('Y-m-d') }}</td>
        <td>{{ $order->updated_at->format('Y-m-d') }}</td>

        <td>
            <form method="POST" action="{{ route('orders.destroy', $order) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('orders.edit', $order) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('orders.show', $order) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
