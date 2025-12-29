<x-layout>

<h1>Receive Order #{{ $order->id }}</h1>

<form action="{{ route('orders.receive', $order) }}" method="POST">
    @csrf

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Ordered</th>
                <th>Received</th>
                <th>Expiry Date</th>
                <th>Location</th>
                <th>Notes</th>
            </tr>
        </thead>

        <tbody>
            @foreach($order->products as $product)
            <tr>
                <td>{{ $product->name }}</td>

                <td>{{ $product->pivot->quantity }}</td>

                <td>
                    <input type="number"
                           name="items[{{ $product->id }}][received_qty]"
                           value="{{ $product->pivot->quantity }}"
                           min="0">
                </td>

                <td>
                    <input type="date"
                           name="items[{{ $product->id }}][expiry_date]">
                </td>

                <td>
                    <select name="items[{{ $product->id }}][location_id]">
                        <option value="">-- None --</option>
                        @foreach($locations as $loc)
                        <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                        @endforeach
                    </select>
                </td>

                <td>
                    <textarea name="items[{{ $product->id }}][notes]"
                              rows="2"></textarea>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit">Confirm Receipt</button>

</form>

</x-layout>
