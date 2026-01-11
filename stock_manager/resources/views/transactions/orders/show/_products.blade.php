@if($order->products->count())
<h3 class="text-xl font-semibold mb-4">Products in this Order</h3>

<div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-x-auto">
    <table class="min-w-full text-sm table-striped">
        <thead class="bg-gray-50 text-gray-600 border-b">
            <tr>
                <th class="px-4 py-2 text-left font-medium">Quantity</th>
                <th class="px-4 py-2 text-left font-medium">Product</th>
                <th class="px-4 py-2 text-left font-medium">Brand</th>
                <th class="px-4 py-2 text-left font-medium">Check</th>
                <th class="px-4 py-2 text-left font-medium">Expiry</th>
                <th class="px-4 py-2 text-left font-medium">Damaged</th>
                <th class="px-4 py-2 text-left font-medium">Missing</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @foreach($order->products as $product)
            <tr>
                {{-- QUANTITY --}}
                <td class="px-4 py-2 whitespace-nowrap">
                    {{ $product->pivot->quantity }}
                </td>
                
                {{-- PRODUCT NAME --}}
                <td class="px-4 py-2 whitespace-nowrap">
                    <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:underline">
                        {{ $product->name }}
                    </a>
                </td>

                {{-- BRAND NAME --}}
                <td class="px-4 py-2 whitespace-nowrap">
                    @if($product->brand)
                    <a href="{{ route('brands.show', $product->brand) }}" class="text-blue-600 hover:underline">
                        {{ $product->brand->name }}
                    </a>
                    @else
                    —
                    @endif
                </td>

                {{-- EXPIRY --}}
                <td class="px-4 py-2 whitespace-nowrap">
                    {{ $product->pivot->expiry_date ?? '—' }}
                </td>

                {{-- DAMAGED --}}
                <td class="px-4 py-2 whitespace-nowrap">
                    @if($product->pivot->damaged_qty > 0)
                    <span class="badge badge-danger">Damaged ({{ $product->pivot->damaged_qty }})</span>
                    @else
                    —
                    @endif
                </td>

                {{-- MISSING --}}
                <td class="px-4 py-2 whitespace-nowrap">
                    @if($product->pivot->missing_qty > 0)
                    <span class="badge badge-warning">Missing ({{ $product->pivot->missing_qty }})</span>
                    @else
                    —
                    @endif
                </td>

                {{-- CHECK STATUS --}}
                <td class="px-4 py-2 whitespace-nowrap">
                    @if($product->pivot->checked_qty !== $product->pivot->quantity)
                    <span class="badge badge-info">Mismatch</span>
                    @else
                    <span class="badge badge-success">OK</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
