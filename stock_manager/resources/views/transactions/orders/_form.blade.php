<x-layout>

    <h1>Edit Order #{{ $order->id }}</h1>

    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')

        <h2>Order Details</h2>

        <div>
            <label>Representative:</label>
            <select name="representative_id">
                <option value="">-- None --</option>
                @foreach($representatives as $rep)
                <option value="{{ $rep->id }}" {{ $order->representative_id == $rep->id ? 'selected' : '' }}>
                    {{ $rep->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Delivery Date:</label>
            <input type="date" name="delivery_date" value="{{ $order->delivery_date }}">
        </div>

        <div>
            <label>Status:</label>
            <select name="status_id">
                @foreach($statuses as $status)
                <option value="{{ $status->id }}" {{ $order->status_id == $status->id ? 'selected' : '' }}>
                    {{ $status->state }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Notes:</label>
            <textarea name="notes" rows="3">{{ $order->notes ?? '' }}</textarea>
        </div>

        <h2>Products Already in This Order</h2>

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Current Qty</th>
                    <th>New Qty</th>
                </tr>
            </thead>

            <tbody>
                @foreach($existingProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>
                        <input type="number" name="existing[{{ $product->id }}]" value="{{ $product->pivot->quantity }}" min="0">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Add New Products</h2>

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Stock</th>
                    <th>Add Qty</th>
                </tr>
            </thead>

            <tbody>
                @foreach($newProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->stocks->sum('quantity') }}</td>
                    <td>
                        <input type="number" name="new[{{ $product->id }}]" value="0" min="0">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit">Save Changes</button>
    </form>

</x-layout>
