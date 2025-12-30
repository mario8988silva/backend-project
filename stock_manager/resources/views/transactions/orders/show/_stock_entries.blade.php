<h2>Stock Entries Created From This Order</h2>

@if($order->stockEntries->isEmpty())
    <p>No stock entries were created for this order.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Expiry Date</th>
                <th>Location</th>
                <th>Notes</th>
                <th>Created At</th>
            </tr>
        </thead>

        <tbody>
            @foreach($order->stockEntries as $stock)
                <tr>
                    <td>{{ $stock->product->name }}</td>
                    <td>{{ $stock->quantity }}</td>
                    <td>{{ $stock->expiry_date ?? '—' }}</td>
                    <td>{{ $stock->location->name ?? '—' }}</td>
                    <td>{{ $stock->notes ?? '—' }}</td>
                    <td>{{ $stock->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
