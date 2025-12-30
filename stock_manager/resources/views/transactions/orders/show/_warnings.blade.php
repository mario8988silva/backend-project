@if($order->hasDamagedItems() || $order->hasMissingItems() || $order->hasQuantityMismatch())
    <div class="warnings">
        @if($order->hasDamagedItems())
            <p class="text-danger">⚠️ {{ $order->damagedCount() }} damaged items detected.</p>
        @endif

        @if($order->hasMissingItems())
            <p class="text-warning">⚠️ {{ $order->missingCount() }} missing items detected.</p>
        @endif

        @if($order->hasQuantityMismatch())
            <p class="text-info">⚠️ {{ $order->mismatchCount() }} products have quantity mismatches.</p>
        @endif
    </div>
@endif
