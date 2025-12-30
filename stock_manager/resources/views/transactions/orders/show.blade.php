<x-show 
    :title="'Order #' . $order->id"
    :editRoute="route('orders.edit', $order)"
    :deleteRoute="route('orders.destroy', $order)"
    :indexRoute="route('orders.index')"
    :fields="[
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
    ]"
>

    @include('transactions.orders.show._warnings')
    @include('transactions.orders.show._products')
    @include('transactions.orders.show._stock_entries')
    @include('transactions.orders.show._representative')
    @include('transactions.orders.show._invoice')
    @include('transactions.orders.show._status_actions')
    @include('transactions.orders.show._stock_movements')
    @include('transactions.orders.show._timeline')

</x-show>
