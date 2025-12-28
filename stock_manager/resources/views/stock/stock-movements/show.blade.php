<x-show :title="'Stock Movement #' . $stockMovement->id" :editRoute="route('stock-movements.edit', $stockMovement)" :deleteRoute="route('stock-movements.destroy', $stockMovement)" :indexRoute="route('stock-movements.index')" :fields="[
        'ID' => $stockMovement->id,
        'Product' => $stockMovement->product->name ?? '—',
        'Movement Type' => ucfirst($stockMovement->movement_type),
        'Quantity' => $stockMovement->quantity,
        'Order' => $stockMovement->order ? 'Order #' . $stockMovement->order->id : '—',
        'Stock Entry' => $stockMovement->stock ? 'Stock #' . $stockMovement->stock->id : '—',
        'Moved At' => $stockMovement->moved_at ?? '—',
        'Notes' => $stockMovement->notes ?? '—',
        'Created At' => $stockMovement->created_at->format('Y-m-d H:i'),
        'Updated At' => $stockMovement->updated_at->format('Y-m-d H:i'),
    ]">
    {{-- OPTIONAL EXTRA SECTION: Product --}}
    @if($stockMovement->product)
    <h3>Product</h3>
    <ul>
        <li>
            <a href="{{ route('products.show', $stockMovement->product) }}">
                {{ $stockMovement->product->name }}
            </a>
        </li>
    </ul>
    @endif

    {{-- OPTIONAL EXTRA SECTION: Order --}}
    @if($stockMovement->order)
    <h3>Order</h3>
    <ul>
        <li>
            <a href="{{ route('orders.show', $stockMovement->order) }}">
                Order #{{ $stockMovement->order->id }}
            </a>
        </li>
    </ul>
    @endif

    {{-- OPTIONAL EXTRA SECTION: Stock --}}
    @if($stockMovement->stock)
    <h3>Stock Entry</h3>
    <ul>
        <li>
            <a href="{{ route('stocks.show', $stockMovement->stock) }}">
                Stock #{{ $stockMovement->stock->id }}
            </a>
        </li>
    </ul>
    @endif
</x-show>
