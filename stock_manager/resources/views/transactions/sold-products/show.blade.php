<x-show :title="'Sold Product #' . $soldProduct->id" :editRoute="route('sold-products.edit', $soldProduct)" :deleteRoute="route('sold-products.destroy', $soldProduct)" :indexRoute="route('sold-products.index')":fields="[
        'ID' => $soldProduct->id,
        'Product' => $soldProduct->product->name ?? '—',
        'Order' => $soldProduct->order ? 'Order #' . $soldProduct->order->id : '—',
        'Quantity' => $soldProduct->quantity,
        'Price' => number_format($soldProduct->price, 2) . ' €',
        'Total' => number_format($soldProduct->total, 2) . ' €',
        'Sold At' => $soldProduct->sold_at ?? '—',
        'Location' => $soldProduct->location ?? '—',
        'Notes' => $soldProduct->notes ?? '—',
        'Created At' => $soldProduct->created_at->format('Y-m-d H:i'),
        'Updated At' => $soldProduct->updated_at->format('Y-m-d H:i'),
    ]">
    {{-- OPTIONAL EXTRA SECTION: Product --}}
    @if($soldProduct->product)
    <h3>Product</h3>
    <ul>
        <li>
            <a href="{{ route('products.show', $soldProduct->product) }}">
                {{ $soldProduct->product->name }}
            </a>
        </li>
    </ul>
    @endif

    {{-- OPTIONAL EXTRA SECTION: Order --}}
    @if($soldProduct->order)
    <h3>Order</h3>
    <ul>
        <li>
            <a href="{{ route('orders.show', $soldProduct->order) }}">
                Order #{{ $soldProduct->order->id }}
            </a>
        </li>
    </ul>
    @endif
</x-show>
