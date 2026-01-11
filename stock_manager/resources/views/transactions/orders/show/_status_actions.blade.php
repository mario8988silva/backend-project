<h2>Status: {{ $order->status->state }}</h2>

<div class="space-y-3">
    @if($order->isDraft())
    <form action="{{ route('orders.submit', $order) }}" method="POST">
        @csrf
        <button type="submit">Submit Order</button>
    </form>
    @endif

    @if($order->isSubmitted())

    <a href="{{ route('orders.receive.form', $order) }}">Receive Order</a>

    <form action="{{ route('orders.autoReceive', $order) }}" method="POST">
        @csrf
        <button type="submit">Mark as Received</button>
    </form>
    @endif

    @if($order->isReceived())
    <a href="{{ route('orders.arrival-check.form', $order) }}">Arrival Check</a>
    @endif

    @if($order->status->state === 'ARRIVAL CHECK')
    <a href="{{ route('orders.order-check.form', $order) }}">Order Check</a>
    @endif

    @if($order->status->state === 'ORDER CHECK')
    <form action="{{ route('orders.close', $order) }}" method="POST">
        @csrf
        <button type="submit">Close Order</button>
    </form>
    @endif

    @if(!$order->isCancelled() && !$order->isReceived())
    <form action="{{ route('orders.cancel', $order) }}" method="POST">
        @csrf
        <button type="submit">Cancel Order</button>
    </form>
    @endif
</div>
