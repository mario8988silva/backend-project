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
