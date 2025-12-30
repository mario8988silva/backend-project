<h2>Stock Movements for This Order</h2>

@if($order->stockMovements->isEmpty())
    <p>No stock movements recorded for this order.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Movement Type</th>
                <th>Quantity</th>
                <th>Stock Entry</th>
                <th>Date</th>
                <th>Notes</th>
            </tr>
        </thead>

        <tbody>
            @foreach($order->stockMovements as $movement)
                <tr>
                    <td>{{ $movement->product->name }}</td>
                    <td>{{ $movement->movement_type }}</td>
                    <td>{{ $movement->quantity }}</td>
                    <td>#{{ $movement->stock_id }}</td>
                    <td>{{ $movement->created_at->format('Y-m-d H:i') }}</td>
                    <td>{{ $movement->notes ?? '—' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
