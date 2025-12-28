<x-show :title="'Order #' . $order->id" :editRoute="route('orders.edit', $order)" :deleteRoute="route('orders.destroy', $order)" :indexRoute="route('orders.index')" :fields="[
        'ID' => $order->id,
        'Representative' => $order->representative->name ?? '—',
        'User' => $order->user->name ?? '—',
        'Order Date' => $order->order_date,
        'Delivery Date' => $order->delivery_date ?? '—',
        'Invoice' => $order->invoice ? 'Invoice #' . $order->invoice->number : '—',
        'Status' => $order->status->state ?? '—',
        'Products Count' => $order->products->count(),
        'Created At' => $order->created_at->format('Y-m-d H:i'),
        'Updated At' => $order->updated_at->format('Y-m-d H:i'),
    ]">
    {{-- OPTIONAL EXTRA SECTION: Products --}}
    @if($order->products->count())
    <h3>Products in this Order</h3>
    <ul>
        @foreach($order->products as $product)
        <li>
            <a href="{{ route('products.show', $product) }}">
                {{ $product->name }}
            </a>
            — Qty: {{ $product->pivot->quantity }}
            @if($product->pivot->expiry_date)
            — Exp: {{ $product->pivot->expiry_date }}
            @endif
        </li>
        @endforeach
    </ul>
    @endif

    {{-- OPTIONAL EXTRA SECTION: Representative --}}
    @if($order->representative)
    <h3>Representative</h3>
    <ul>
        <li>
            <a href="{{ route('representatives.show', $order->representative) }}">
                {{ $order->representative->name }}
            </a>
        </li>
    </ul>
    @endif

    {{-- OPTIONAL EXTRA SECTION: Invoice --}}
    @if($order->invoice)
    <h3>Invoice</h3>
    <ul>
        <li>
            <a href="{{ route('invoices.show', $order->invoice) }}">
                Invoice #{{ $order->invoice->number }}
            </a>
        </li>
    </ul>
    @endif
</x-show>
