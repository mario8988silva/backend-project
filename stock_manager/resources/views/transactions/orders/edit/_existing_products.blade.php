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
