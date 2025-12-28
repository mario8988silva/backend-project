<x-show :title="'Invoice #' . $invoice->number" :editRoute="route('invoices.edit', $invoice)" :deleteRoute="route('invoices.destroy', $invoice)" :indexRoute="route('invoices.index')" :fields="[
        'ID' => $invoice->id,
        'Number' => $invoice->number,
        'Issue Date' => $invoice->issue_date,
        'Due Date' => $invoice->due_date,
        'Order' => $invoice->order ? 'Order #' . $invoice->order->id : '—',
        'Supplier' => $invoice->supplier->name ?? '—',
        'Total Amount' => $invoice->total_amount . ' ' . $invoice->currency,
        'Currency' => $invoice->currency,
        'Notes' => $invoice->notes ?? '—',
        'Created At' => $invoice->created_at->format('Y-m-d H:i'),
        'Updated At' => $invoice->updated_at->format('Y-m-d H:i'),
    ]">
    {{-- OPTIONAL EXTRA SECTION: Order --}}
    @if($invoice->order)
    <h3>Order</h3>
    <ul>
        <li>
            <a href="{{ route('orders.show', $invoice->order) }}">
                Order #{{ $invoice->order->id }}
            </a>
        </li>
    </ul>
    @endif

    {{-- OPTIONAL EXTRA SECTION: Supplier --}}
    @if($invoice->supplier)
    <h3>Supplier</h3>
    <ul>
        <li>
            <a href="{{ route('suppliers.show', $invoice->supplier) }}">
                {{ $invoice->supplier->name }}
            </a>
        </li>
    </ul>
    @endif
</x-show>
