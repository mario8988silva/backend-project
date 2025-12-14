<x-layout>
    <h2>Products List</h2>
    {{--
    <h2>Orders List</h2>
    <h2>Retailers List</h2>
    <h2>Representatives List</h2>
    <h2>Team List</h2>
    <h2>Stock List</h2>
    --}}

    <form method="GET" action="{{ route('products.index') }}">
        <select name="order">
            <option value="">-- Order --</option>
            <option value="newest" {{ request('order')=='newest' ? 'selected' : '' }}>Newest first</option>
            <option value="oldest" {{ request('order')=='oldest' ? 'selected' : '' }}>Oldest first</option>
        </select>

        <select name="brand_id">
            <option value="">-- Brand --</option>
            @foreach($brands as $brand)
            <option value="{{ $brand->id }}" {{ request('brand_id')==$brand->id ? 'selected' : '' }}>
                {{ $brand->name }}
            </option>
            @endforeach
        </select>

        <select name="subcategory_id">
            <option value="">-- Subcategory --</option>
            @foreach($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}" {{ request('subcategory_id')==$subcategory->id ? 'selected' : '' }}>
                {{ $subcategory->name }}
            </option>
            @endforeach
        </select>

        <select name="category_id">
            <option value="">-- Category --</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ request('category_id')==$category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>

        <select name="family_id">
            <option value="">-- Family --</option>
            @foreach($families as $family)
            <option value="{{ $family->id }}" {{ request('family_id')==$family->id ? 'selected' : '' }}>
                {{ $family->name }}
            </option>
            @endforeach
        </select>

        <select name="unit_type_id">
            <option value="">-- Unit Type --</option>
            @foreach($unit_types as $unitType)
            <option value="{{ $unitType->id }}" {{ request('unit_type_id')==$unitType->id ? 'selected' : '' }}>
                {{ $unitType->name }}
            </option>
            @endforeach
        </select>

        <select name="iva_category_id">
            <option value="">-- IVA Category --</option>
            @foreach($iva_categories as $iva)
            <option value="{{ $iva->id }}" {{ request('iva_category_id')==$iva->id ? 'selected' : '' }}>
                {{ $iva->name }}
            </option>
            @endforeach
        </select>

        <select name="nutri_score_id">
            <option value="">-- Nutri Score --</option>
            @foreach($nutri_scores as $nutri)
            <option value="{{ $nutri->id }}" {{ request('nutri_score_id')==$nutri->id ? 'selected' : '' }}>
                {{ $nutri->label }}
            </option>
            @endforeach
        </select>

        <select name="eco_score_id">
            <option value="">-- Eco Score --</option>
            @foreach($eco_scores as $eco)
            <option value="{{ $eco->id }}" {{ request('eco_score_id')==$eco->id ? 'selected' : '' }}>
                {{ $eco->label }}
            </option>
            @endforeach
        </select>



        {{-- BOOLEAN FILTERS --}}
        <select name="sugar_free">
            <option value="">-- Sugar Free? --</option>
            <option value="1" {{ request('sugar_free')=='1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ request('sugar_free')=='0' ? 'selected' : '' }}>No</option>
        </select>

        <select name="gluten_free">
            <option value="">-- Gluten Free? --</option>
            <option value="1" {{ request('gluten_free')=='1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ request('gluten_free')=='0' ? 'selected' : '' }}>No</option>
        </select>

        <select name="vegan">
            <option value="">-- Vegan? --</option>
            <option value="1" {{ request('vegan')=='1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ request('vegan')=='0' ? 'selected' : '' }}>No</option>
        </select>

        <select name="vegetarian">
            <option value="">-- Vegetarian? --</option>
            <option value="1" {{ request('vegetarian')=='1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ request('vegetarian')=='0' ? 'selected' : '' }}>No</option>
        </select>

        <select name="organic">
            <option value="">-- Organic? --</option>
            <option value="1" {{ request('organic')=='1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ request('organic')=='0' ? 'selected' : '' }}>No</option>
        </select>

        {{-- TYPE --}}
        <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">

        {{-- APPLY --}}
        <button type="submit">Apply Filters</button>

        <!-- Reset button -->
        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            Reset Filters
        </a>
    </form>

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
                <th>delete</th>
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
            <td onclick="window.location='{{ route('products.show', $product->id) }}'">
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
            <td onclick="window.location='{{ route('products.edit', $product->id) }}'"><button type="submit">Edit</button></td>
            <td onclick="window.location='{{ route('products.show', $product->id) }}'"><button type="submit">See</button></td>
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
