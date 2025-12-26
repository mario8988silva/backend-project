@php
$columns = [
    ['number', 'Number'],
    ['supplier', 'Supplier'],
    ['order', 'Order'],
    ['issue_date', 'Issue Date'],
    ['due_date', 'Due Date'],
    ['total_amount', 'Total'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Invoices List'" :columns="$columns">

    <x-slot name="filters">
        <td>
            <input type="text"
                   name="number"
                   placeholder="Number"
                   value="{{ request('number') }}">
        </td>

        <td>
            <select name="supplier_id">
                <option value="">-- Supplier --</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}"
                        {{ request('supplier_id') == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </td>

        <td>
            <input type="text"
                   name="order_id"
                   placeholder="Order ID"
                   value="{{ request('order_id') }}">
        </td>

        <td>
            <input type="date"
                   name="issue_from"
                   value="{{ request('issue_from') }}">
        </td>

        <td>
            <input type="date"
                   name="due_to"
                   value="{{ request('due_to') }}">
        </td>

        <td></td>
        <td></td>
    </x-slot>

    @foreach($invoices as $invoice)
    <tr>
        <td>{{ $invoice->number }}</td>

        <td>{{ $invoice->supplier->name ?? '—' }}</td>

        <td>{{ $invoice->order->id ?? '—' }}</td>

        <td>{{ $invoice->issue_date }}</td>

        <td>{{ $invoice->due_date }}</td>

        <td>{{ number_format($invoice->total_amount, 2) }} {{ $invoice->currency }}</td>

        <td>{{ $invoice->created_at->format('Y-m-d') }}</td>
        <td>{{ $invoice->updated_at->format('Y-m-d') }}</td>

        <td>
            <form method="POST" action="{{ route('invoices.destroy', $invoice) }}">
                @csrf @method('DELETE')
                <button>Delete</button>
            </form>
        </td>

        <td>
            <a href="{{ route('invoices.edit', $invoice) }}">Edit</a>
        </td>

        <td>
            <a href="{{ route('invoices.show', $invoice) }}">See</a>
        </td>
    </tr>
    @endforeach

</x-index>
