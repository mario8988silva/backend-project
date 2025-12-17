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

        <table>
            <thead>
                <tr>
                    <th>Brand</th>
                    <th>Subcategory</th>
                    <th>Category</th>
                    <th>Family</th>
                    <th>Unit Type</th>
                    <th>IVA Category</th>
                    <th>Nutri Score</th>
                    <th>Eco Score</th>
                    <th>Sugar Free</th>
                    <th>Gluten Free</th>
                    <th>Vegan</th>
                    <th>Vegetarian</th>
                    <th>Organic</th>
                    <th>Search</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>
                        <select name="brand_id">
                            <option value="">-- Brand --</option>
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ request('brand_id')==$brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <select name="subcategory_id">
                            <option value="">-- Subcategory --</option>
                            @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" {{ request('subcategory_id')==$subcategory->id ? 'selected' : '' }}>
                                {{ $subcategory->name }}
                            </option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <select name="category_id">
                            <option value="">-- Category --</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id')==$category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <select name="family_id">
                            <option value="">-- Family --</option>
                            @foreach($families as $family)
                            <option value="{{ $family->id }}" {{ request('family_id')==$family->id ? 'selected' : '' }}>
                                {{ $family->name }}
                            </option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <select name="unit_type_id">
                            <option value="">-- Unit Type --</option>
                            @foreach($unit_types as $unitType)
                            <option value="{{ $unitType->id }}" {{ request('unit_type_id')==$unitType->id ? 'selected' : '' }}>
                                {{ $unitType->symbol }} - {{ $unitType->name }}
                            </option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <select name="iva_category_id">
                            <option value="">-- IVA Category --</option>
                            @foreach($iva_categories as $iva)
                            <option value="{{ $iva->id }}" {{ request('iva_category_id')==$iva->id ? 'selected' : '' }}>
                                {{ $iva->rate }} -
                                {{ $iva->name }}
                            </option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <select name="nutri_score_id">
                            <option value="">-- Nutri Score --</option>
                            @foreach($nutri_scores as $nutri)
                            <option value="{{ $nutri->id }}" {{ request('nutri_score_id')==$nutri->id ? 'selected' : '' }}>
                                {{ $nutri->grade }}
                            </option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <select name="eco_score_id">
                            <option value="">-- Eco Score --</option>
                            @foreach($eco_scores as $eco)
                            <option value="{{ $eco->id }}" {{ request('eco_score_id')==$eco->id ? 'selected' : '' }}>
                                {{ $eco->grade }}
                            </option>
                            @endforeach
                        </select>
                    </td>

                    {{-- BOOLEAN FILTERS --}}
                    <td>
                        <input type="checkbox" name="sugar_free" value="1" {{ request('sugar_free') == '1' ? 'checked' : '' }}>
                    </td>

                    <td>
                        <input type="checkbox" name="gluten_free" value="1" {{ request('gluten_free') == '1' ? 'checked' : '' }}>
                    </td>

                    <td>
                        <input type="checkbox" name="vegan" value="1" {{ request('vegan') == '1' ? 'checked' : '' }}>
                    </td>

                    <td>
                        <input type="checkbox" name="vegetarian" value="1" {{ request('vegetarian') == '1' ? 'checked' : '' }}>
                    </td>

                    <td>
                        <input type="checkbox" name="organic" value="1" {{ request('organic') == '1' ? 'checked' : '' }}>
                    </td>

                    <td>
                        {{-- TYPE --}}
                        <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">
                    </td>
                <tr>
                    <td>
                        {{-- APPLY --}}
                        <button type="submit">Apply Filters</button>
                    </td>

                    <td>
                        <!-- Reset button -->
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            Reset Filters
                        </a>
                    </td>
                </tr>
    </form>

    <table>
        <thead>
            <tr>
                <th>
                    <x-sort-links column="updated_at" label="Updated At" />
                </th>

                <th>
                    <x-sort-links column="barcode" label="Barcode" />
                </th>

                <th>
                    <x-sort-links column="name" label="Name" />
                </th>

                <th>
                    <x-sort-links column="brand" label="Brand" />
                </th>

                <th>
                    <x-sort-links column="subcategory" label="Subcategory" />
                </th>

                <th>
                    <x-sort-links column="category" label="Category" />
                </th>

                <th>
                    <x-sort-links column="family" label="Family" />
                </th>

                <th>
                    <x-sort-links column="unit_type_id" label="Unit Type" />
                </th>

                <th>
                    <x-sort-links column="iva_category_id" label="IVA Category" />
                </th>

                <th>
                    <x-sort-links column="nutri_score_id" label="Nutri Score" />
                </th>

                <th>
                    <x-sort-links column="eco_score_id" label="Eco Score" />
                </th>

                <th>
                    <x-sort-links column="sugar_free" label="Sugar Free" />
                </th>

                <th>
                    <x-sort-links column="gluten_free" label="Gluten Free" />
                </th>

                <th>
                    <x-sort-links column="vegan" label="Vegan" />
                </th>

                <th>
                    <x-sort-links column="vegetarian" label="Vegetarian" />
                </th>

                <th>
                    <x-sort-links column="organic" label="Organic" />
                </th>

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
            <td>{{ $product->created_at->format('Y/m/d g:i a') ?? 'x' }}</td>
            <td>{{ $product->barcode ?? 'x' }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->brand->name ?? 'x' }}</td>
            <td>{{ $product->subcategory->name ?? 'x' }}</td>
            <td>{{ $product->subcategory->category->name ?? 'x' }}</td>
            <td>{{ $product->subcategory->category->family->name ?? 'x' }}</td>
            <td>{{ $product->unit_type->name ?? 'x' }}</td>
            <td>{{ $product->iva_category->rate ?? 'x' }} %</td>
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

            <td>
                <a href="{{ route('products.edit', $product->id) }}">
                    <button type="button">Edit</button>
                </a>
            </td>
            
            <td>
                <a href="{{ route('products.show', $product->id) }}">
                    <button type="button">See</button>
                </a>
            </td>

        </tr>
        @endforeach
    </table>

    <!-- pagination -->
    {{ $products->links()}}
</x-layout>
