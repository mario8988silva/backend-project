{{--
<x-show :title="'Waste Log #' . $wasteLog->id" :editRoute="route('waste-logs.edit', $wasteLog)" :deleteRoute="route('waste-logs.destroy', $wasteLog)" :indexRoute="route('waste-logs.index')" :fields="[
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
    --}}
    {{-- Product --}}
    {{--
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

    {{-- Order --}}
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
</x-show>
--}}
