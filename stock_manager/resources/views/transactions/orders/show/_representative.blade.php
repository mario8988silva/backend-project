@if($order->representative)
    <h3>Representative</h3>
    <ul>
        <li>
            <a href="{{ route('representatives.show', $order->representative) }}">
                {{ $order->representative->name }}
            </a>

            <a href="{{ route('representatives.show', $order->representative) }}">
                {{ $order->representative->name }}
            </a>
        </li>
    </ul>
@endif
