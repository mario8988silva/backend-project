<x-show :title="'Stock Entry #' . $stock->id" :editRoute="route('stocks.edit', $stock)" :deleteRoute="route('stocks.destroy', $stock)" :indexRoute="route('stocks.index')" :fields="[
        'ID' => $stock->id,
        'Product' => $stock->product->name ?? '—',
        'Order Item' => $stock->orderHasProduct
            ? 'Order #' . $stock->orderHasProduct->order_id . ' — ' . ($stock->orderHasProduct->product->name ?? 'Unknown Product')
            : '—',
        'Status' => $stock->status->state ?? '—',
        'Quantity' => $stock->quantity,
        'Location' => $stock->location ?? '—',
        'Created At' => $stock->created_at->format('Y-m-d H:i'),
        'Updated At' => $stock->updated_at->format('Y-m-d H:i'),
    ]">
    {{-- OPTIONAL EXTRA SECTION: Product --}}
    @if($stock->product)
    <h3>Product</h3>
    <ul>
        <li>
            <a href="{{ route('products.show', $stock->product) }}">
                {{ $stock->product->name }}
            </a>
        </li>
    </ul>
    @endif

    {{-- OPTIONAL EXTRA SECTION: OrderHasProduct --}}
    @if($stock->orderHasProduct)
    <h3>Order Item</h3>
    <ul>
        <li>
            <a href="{{ route('orders.show', $stock->orderHasProduct->order_id) }}">
                Order #{{ $stock->orderHasProduct->order_id }}
            </a>
            — Qty: {{ $stock->orderHasProduct->quantity }}
            @if($stock->orderHasProduct->expiry_date)
            — Exp: {{ $stock->orderHasProduct->expiry_date }}
            @endif
        </li>
    </ul>
    @endif

    {{-- OPTIONAL EXTRA SECTION: Status --}}
    @if($stock->status)
    <h3>Status</h3>
    <ul>
        <li>
            <a href="{{ route('statuses.show', $stock->status) }}">
                {{ $stock->status->state }}
            </a>
        </li>
    </ul>
    @endif
</x-show>
