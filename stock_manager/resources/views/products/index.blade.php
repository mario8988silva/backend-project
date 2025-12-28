@php
$columns = [
['updated_at', 'Updated At'],
['barcode', 'Barcode'],
['name', 'Name'],
['brand', 'Brand'],
['subcategory', 'Subcategory'],
['category', 'Category'],
['family', 'Family'],
['unit_type_id', 'Unit Type'],
['iva_category_id', 'IVA Category'],
['nutri_score_id', 'Nutri Score'],
['eco_score_id', 'Eco Score'],
['sugar_free', 'Sugar Free'],
['gluten_free', 'Gluten Free'],
['vegan', 'Vegan'],
['vegetarian', 'Vegetarian'],
['organic', 'Organic'],
];
@endphp

<x-layout>
    <h2>Products List</h2>
    {{--
    <h2>Orders List</h2>
    <h2>Suppliers List</h2>
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

            {{--
            <thead>
                <tr>
                    @foreach($headers as $header)
                    <th>{{ $header }}</th>
            @endforeach

            <th>Search</th>
            </tr>
            </thead>
            --}}


            <tbody>
                <tr>
                    {{-- SELECT FILTERS --}}
                    <x-filter-select name="brand_id" label="Brand" :options="$brands" />
                    <x-filter-select name="subcategory_id" label="Subcategory" :options="$subcategories" />
                    <x-filter-select name="category_id" label="Category" :options="$categories" />
                    <x-filter-select name="family_id" label="Family" :options="$families" />
                    <x-filter-select name="unit_type_id" label="Unit Type" :options="$unit_types" />
                    <x-filter-select name="iva_category_id" label="IVA Category" :options="$iva_categories" />
                    <x-filter-select name="nutri_score_id" label="Nutri Score" :options="$nutri_scores" />
                    <x-filter-select name="eco_score_id" label="Eco Score" :options="$eco_scores" />

                    {{-- BOOLEAN FILTERS --}}
                    <x-filter-boolean name="sugar_free" />
                    <x-filter-boolean name="gluten_free" />
                    <x-filter-boolean name="vegan" />
                    <x-filter-boolean name="vegetarian" />
                    <x-filter-boolean name="organic" />

                    {{-- TYPE SEARCH--}}
                    <td>
                        <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">
                    </td>
                <tr>

                    {{-- APPLY/SUBMIT FILTERS--}}
                    <td>

                        <button type="submit">Apply Filters</button>
                    </td>

                    <!-- RESET FILTERS -->
                    <td>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            Reset Filters
                        </a>
                    </td>
                </tr>
    </form>

    <table>
        <thead>
            <thead>
                <tr>
                    @foreach($columns as [$column, $label])
                    <th>
                        <x-sort-links :column="$column" :label="$label" />
                    </th>
                    @endforeach
                    <!--
                </tr>
            </thead>
                    -->


                    <th>delete</th>
                    <th>edit</th>
                    <th>see</th>
                    {{--

                <h2>Orders List</h2>
                <th>Order Date</th>
                <th>Representative</th>
                <th>Supplier</th>
                <th>Status</th>
                <th>See Detail</th>
                
                <h2>Suppliers List</h2>
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
                <th>Supplier</th>
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

                <td>
                    <button type="button" onclick="document.getElementById('deleteModal').showModal()">
                        Delete
                    </button>

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

<dialog id="deleteModal" class="modal">
    <form method="POST" action="{{ route('products.destroy', $product) }}">
        @csrf
        @method('DELETE')

        <h3>Remove Product</h3>

        <p>How many units are being removed?</p>

        <input type="number" name="quantity" min="1" value="1" required>

        <p>Status:</p>
        <select name="status_id" required>
            <option value="">-- Select Status --</option>
            @foreach($statuses as $status)
            <option value="{{ $status->id }}">
                {{ $status->state }}
            </option>
            @endforeach
        </select>

        <div style="margin-top: 1rem;">
            <button type="submit">Confirm Removal</button>
            <button type="button" onclick="document.getElementById('deleteModal').close()">Cancel</button>
        </div>
    </form>
</dialog>
