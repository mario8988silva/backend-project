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
