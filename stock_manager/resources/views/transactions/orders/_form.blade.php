<x-layout>

    <h1>Edit Order #{{ $order->id }}</h1>

    {{-- Validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- ========================= --}}
        {{-- ORDER DETAILS --}}
        {{-- ========================= --}}
        <h2>Order Details</h2>

        <div>
            <label>Representative:</label>
            <select name="representative_id">
                <option value="">-- None --</option>
                @foreach($representatives as $rep)
                    <option value="{{ $rep->id }}" 
                        {{ old('representative_id', $order->representative_id) == $rep->id ? 'selected' : '' }}>
                        {{ $rep->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Delivery Date:</label>
            <input type="date" 
                   name="delivery_date" 
                   value="{{ old('delivery_date', $order->delivery_date) }}">
        </div>

        <div>
            <label>Status:</label>
            <select name="status_id">
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}" 
                        {{ old('status_id', $order->status_id) == $status->id ? 'selected' : '' }}>
                        {{ $status->state }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Notes:</label>
            <textarea name="notes" rows="3">{{ old('notes', $order->notes) }}</textarea>
        </div>

        {{-- ========================= --}}
        {{-- EXISTING PRODUCTS --}}
        {{-- ========================= --}}
        <h2>Products Already in This Order</h2>

        @if($existingProducts->isEmpty())
            <p>No products in this order yet.</p>
        @else
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
                                <input type="number" 
                                       name="existing[{{ $product->id }}]" 
                                       value="{{ old('existing.' . $product->id, $product->pivot->quantity) }}" 
                                       min="0">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        {{-- ========================= --}}
        {{-- ADD NEW PRODUCTS --}}
        {{-- ========================= --}}
        <h2>Add New Products</h2>

        @if($newProducts->isEmpty())
            <p>All products are already in this order.</p>
        @else
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
                                <input type="number" 
                                       name="new[{{ $product->id }}]" 
                                       value="{{ old('new.' . $product->id, 0) }}" 
                                       min="0">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <button type="submit">Save Changes</button>
    </form>

</x-layout>
