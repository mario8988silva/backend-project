<x-layout>
    <h2>Products List</h2>
    {{--
    <h2>Orders List</h2>
    <h2>Retailers List</h2>
    <h2>Representatives List</h2>
    <h2>Team List</h2>
    <h2>Stock List</h2>
    --}}

    <table>
        <thead>
            <tr>
                <th>barcode</th>
                <th>name</th>
                <th>brand</th>
                <th>subcategory</th>
                <th>category</th>
                <th>family</th>                
                <th>unit_type</th>
                <th>iva_category</th>
                <th>nutri_score</th>
                <th>eco_score</th>
                <th>sugar_free</th>
                <th>gluten_free</th>
                <th>vegan</th>
                <th>vegetarian</th>
                <th>organic</th>
                <th>edit</th>
                <th>see</th>
                {{--

                <h2>Orders List</h2>
                <th>Order Date</th>
                <th>Representative</th>
                <th>Retailer</th>
                <th>Status</th>
                <th>See Detail</th>
                
                <h2>Retailers List</h2>
                <th>Name</th>
                <th>Contact</th>
                <th>E-mail</th>
                <th>Address</th>
                <th>Edit</th>
                <th>See Detail</th>

                <h2>Representatives List</h2>
                <th>image</th>
                <th>Name</th>
                <th>Contact</th>
                <th>E-mail</th>
                <th>Retailer</th>
                <th>Edit</th>
                <th>See Detail</th>

                <h2>Team List</h2>
                <th>image</th>
                <th>Name</th>
                <th>Contact</th>
                <th>E-mail</th>
                <th>Role</th>
                <th>Edit</th>
                <th>See Detail</th>

                <h2>Make an order</h2>
                <th>image</th>
                <th>name</th>
                <th>brand</th>
                <th>subcategory</th>
                <th>category</th>
                <th>family</th>                
                <th>stock quantity</th>
                <th>ordered quantity</th>
                <th>edit order quantity</th>
                <th>+ add one</th>

                <h2>Stock List</h2>
                <th>image</th>
                <th>name</th>
                <th>brand</th>
                <th>subcategory</th>
                <th>category</th>
                <th>family</th>                
                <th>stock quantity</th>
                <th>ordered quantity</th>

                --}}

            </tr>
        </thead>

        @foreach($products as $product)
        <tr>
            <td>{{ $product->barcode ?? 'x' }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->brand->name ?? 'x' }}</td>
            <td>{{ $product->subcategory->name ?? 'x' }}</td>
            <td>{{ $product->subcategory->category->name ?? 'x' }}</td>
            <td>{{ $product->subcategory->category->family->name ?? 'x' }}</td>            
            <td>{{ $product->unit_type->name ?? 'x' }}</td>
            <td>{{ $product->iva_category->rate ?? 'x' }}</td>
            <td>{{ $product->nutri_score->grade ?? 'x' }}</td>
            <td>{{ $product->eco_score->grade ?? 'x' }}</td>
            <td>{{ $product->sugar_free ?? '' }}</td>
            <td>{{ $product->gluten_free ?? '' }}</td>
            <td>{{ $product->vegan ?? '' }}</td>
            <td>{{ $product->vegetarian ?? '' }}</td>
            <td>{{ $product->organic ?? '' }}</td>
            <td>edit</td>
            <td onclick="window.location='{{ route('products.show', $product->id) }}'">see</td>
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
