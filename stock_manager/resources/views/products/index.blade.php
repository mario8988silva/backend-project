<x-layout>
    <h2>Products List</h2>

    <table>
        <thead>
            <tr>
                <th>barcode</th>
                <th>name</th>
                <th>subcategory</th>
                <th>category</th>
                <th>family</th>
                <th>brand</th>
                <th>unit_type</th>
                <th>iva_category</th>
                <th>nutri_score</th>
                <th>eco_score</th>
                <th>sugar_free</th>
                <th>gluten_free</th>
                <th>vegan</th>
                <th>vegetarian</th>
                <th>organic</th>
                <th>sugar_free</th>
            </tr>
        </thead>

        @foreach($products as $product)
            <tr onclick="window.location='{{ route('products.show', $product->id) }}'">
                <td>{{ $product->barcode ?? '' }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->subcategory_id ?? '' }}</td>
                <td>{{ $product->category_id ?? '' }}</td>
                <td>{{ $product->family_id ?? '' }}</td>
                <td>{{ $product->brand_id ?? '' }}</td>
                <td>{{ $product->unit_type_id ?? '' }}</td>
                <td>{{ $product->iva_category_id ?? '' }}</td>
                <td>{{ $product->nutri_score_id ?? '' }}</td>
                <td>{{ $product->eco_score_id ?? '' }}</td>
                <td>{{ $product->sugar_free ?? '' }}</td>
                <td>{{ $product->gluten_free ?? '' }}</td>
                <td>{{ $product->vegan ?? '' }}</td>
                <td>{{ $product->vegetarian ?? '' }}</td>
                <td>{{ $product->organic ?? '' }}</td>
                <td>{{ $product->sugar_free ?? '' }}</td>
            </tr>
        @endforeach
    </table>
    
    {{--
    <ul>
        @foreach($products as $product)
        <li>
            <x-card href="{{ route('products.show', $product->id)}}">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description ?? 'No description' }}</p>

            </x-card>
        </li>
        @endforeach
    </ul>
    --}}
    <!-- pagination -->
    {{ $products->links()}}
</x-layout>
