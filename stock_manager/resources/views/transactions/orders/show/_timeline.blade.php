<h2>Order Timeline</h2>

<ul class="timeline">
    @foreach($order->lightweightTimeline() as $label => $timestamp)
        <li>
            <strong>{{ $label }}</strong><br>
            <span>{{ $timestamp->format('Y-m-d H:i') }}</span>
        </li>
    @endforeach
</ul>
