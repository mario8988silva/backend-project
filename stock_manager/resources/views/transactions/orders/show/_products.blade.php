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

                @if($product->pivot->damaged_qty > 0)
                    <span class="badge badge-danger">Damaged</span>
                @endif

                @if($product->pivot->missing_qty > 0)
                    <span class="badge badge-warning">Missing</span>
                @endif

                @if($product->pivot->checked_qty !== $product->pivot->quantity)
                    <span class="badge badge-info">Mismatch</span>
                @endif

                @if(empty($product->pivot->expiry_date))
                    <span class="badge badge-secondary">No Expiry</span>
                @endif
            </li>
        @endforeach
    </ul>
@endif
