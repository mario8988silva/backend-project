<x-layout>

    <h1>Order Check — Order #{{ $order->id }}</h1>

    <form action="{{ route('orders.order-check', $order) }}" method="POST">
        @csrf

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Received</th>
                    <th>Checked</th>
                    <th>Damaged</th>
                    <th>Missing</th>
                    <th>Notes</th>
                </tr>
            </thead>

            <tbody>
                @foreach($order->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>

                    <td>{{ $product->pivot->quantity }}</td>

                    <td>
                        <input type="number" name="items[{{ $product->id }}][checked_qty]" value="{{ $product->pivot->quantity }}" min="0">
                    </td>

                    <td>
                        <input type="number" name="items[{{ $product->id }}][damaged_qty]" value="0" min="0">
                    </td>

                    <td>
                        <input type="number" name="items[{{ $product->id }}][missing_qty]" value="0" min="0">
                    </td>

                    <td>
                        <textarea name="items[{{ $product->id }}][notes]" rows="2"></textarea>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit">Confirm Order Check</button>

    </form>

</x-layout>
