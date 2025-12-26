<x-show :title="'Waste Log #' . $wasteLog->id" :editRoute="route('waste-logs.edit', $wasteLog)" :deleteRoute="route('waste-logs.destroy', $wasteLog)" :fields="[
        'ID' => $wasteLog->id,
        'Product' => $wasteLog->product->name ?? '—',
        'Order' => $wasteLog->order ? 'Order #' . $wasteLog->order->id : '—',
        'Status' => $wasteLog->status->state ?? '—',
        'Quantity' => $wasteLog->quantity,
        'Logged At' => $wasteLog->logged_at ?? '—',
        'Notes' => $wasteLog->notes ?? '—',
        'Created At' => $wasteLog->created_at->format('Y-m-d H:i'),
        'Updated At' => $wasteLog->updated_at->format('Y-m-d H:i'),
    ]">
    {{-- OPTIONAL EXTRA SECTION: Product --}}
    @if($wasteLog->product)
    <h3>Product</h3>
    <ul>
        <li>
            <a href="{{ route('products.show', $wasteLog->product) }}">
                {{ $wasteLog->product->name }}
            </a>
        </li>
    </ul>
    @endif

    {{-- OPTIONAL EXTRA SECTION: Order --}}
    @if($wasteLog->order)
    <h3>Order</h3>
    <ul>
        <li>
            <a href="{{ route('orders.show', $wasteLog->order) }}">
                Order #{{ $wasteLog->order->id }}
            </a>
        </li>
    </ul>
    @endif

    {{-- OPTIONAL EXTRA SECTION: Status --}}
    @if($wasteLog->status)
    <h3>Status</h3>
    <ul>
        <li>
            <a href="{{ route('statuses.show', $wasteLog->status) }}">
                {{ $wasteLog->status->state }}
            </a>
        </li>
    </ul>
    @endif
</x-show>
