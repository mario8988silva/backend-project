<x-layout>
    <h2>Create Page</h2>


    {{-- --------------------------------------------------------- 
    <h3>Debug: brands</h3>
    <pre>
    @foreach($brands as $brand)
    {{ $brand->id }} - {{ $brand->name }}
    @endforeach
    </pre>

    <h3>Debug: categories</h3>
    <pre>
    @foreach($categories as $category)
    {{ $category->id }} - {{ $category->name }}
    @endforeach
    </pre>
    <h3>Debug: ecoScores</h3>
    <pre>
    @foreach($eco_scores as $eco_score)
    {{ $eco_score->id }} - {{ $eco_score->name }}
    @endforeach
    </pre>
    <h3>Debug: families</h3>
    <pre>
    @foreach($families as $family)
    {{ $family->id }} - {{ $family->name }}
    @endforeach
    </pre>
    <h3>Debug: ivaCategories</h3>
    <pre>
    @foreach($iva_categories as $ivaCategory)
    {{ $ivaCategory->id }} - {{ $ivaCategory->name }}
    @endforeach
    </pre>
    <h3>Debug: nutriScores</h3>
    <pre>
    @foreach($nutri_scores as $nutriScore)
    {{ $nutriScore->id }} - {{ $nutriScore->name }}
    @endforeach
    </pre>
    <h3>Debug: subcategories</h3>
    <pre>
    @foreach($subcategories as $subcategory)
    {{ $subcategory->id }} - {{ $subcategory->name }}
    @endforeach
    </pre>
    <h3>Debug: unitTypes</h3>
    <pre>
    @foreach($unit_types as $unitType)
    {{ $unitType->id }} - {{ $unitType->name }}
    @endforeach
    </pre>-
    --------------------------------------------------------- --}}


    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <!-- Barcode -->
        <!--
        <div>
            <label for="barcode">Barcode</label>
            <input type="text" name="barcode" id="barcode" maxlength="45" placeholder="Optional barcode">
        </div>
-->
        <!-- product name -->
        <div>
            <label for="name">Product Name: *</label>
            <input type="text" id="name" name="name" value={{ old('name') }} required>
        </div>

        <!-- Image -->
        <div>
            <label for="image">Image URL</label>
            <input type="text" name="image" id="image" maxlength="255" placeholder="Optional image URL">
        </div>

        <!-- Description -->
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="3">{{ old('description') }}</textarea>
        </div>

        <!-- Foreign Keys -->

        <div>
            <div>
                <label for="unit_type_id">Unit Type</label>
                <select name="unit_type_id" id="unit_type_id">
                    <option value="">-- Select --</option>
                    @foreach($unit_types as $unitType)
                    <option value="{{ $unitType->id }}" {{ $unitType->id == old('unit_type_id') ? 'selected' : '' }}>{{ $unitType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="iva_category_id">IVA Category</label>
                <select name="iva_category_id" id="iva_category_id">
                    <option value="">-- Select --</option>
                    @foreach($iva_categories as $ivaCategory)
                    <option value="{{ $ivaCategory->id }}" {{ $ivaCategory->id == old('iva_category_id') ? 'selected' : '' }}>{{ $ivaCategory->name }}</option>
                    @endforeach

                </select>
            </div>

            <div>
                <label for="brand_id">Brand</label>
                <select name="brand_id" id="brand_id">
                    <option value="">-- Select --</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ $brand->id == old('brand') ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="subcategory_id">Subcategory</label>
                <select name="subcategory_id" id="subcategory_id">
                    <option value="">-- Select --</option>
                    @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == old('subcategory_id') ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="nutri_score_id">Nutri Score</label>
                <select name="nutri_score_id" id="nutri_score_id">
                    <option value="">-- Select --</option>
                    @foreach($nutri_scores as $nutriScore)
                    <option value="{{ $nutriScore->id }}" {{ $nutriScore->id == old('nutri_score_id') ? 'selected' : '' }}>{{ $nutriScore->label }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="eco_score_id">Eco Score</label>
                <select name="eco_score_id" id="eco_score_id">
                    <option value="">-- Select --</option>
                    @foreach($eco_scores as $ecoScore)
                    <option value="{{ $ecoScore->id }}" {{ $ecoScore->id == old('eco_score_id') ? 'selected' : '' }}>{{ $ecoScore->label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Attributes -->
        <fieldset>
            <legend>Attributes</legend>
            <label>
                <input type="checkbox" name="sugar_free" value="1"> Sugar Free
            </label>
            <label>
                <input type="checkbox" name="gluten_free" value="1"> Gluten Free
            </label>
            <label>
                <input type="checkbox" name="lactose_free" value="1"> Lactose Free
            </label>
            <label>
                <input type="checkbox" name="vegan" value="1"> Vegan
            </label>
            <label>
                <input type="checkbox" name="vegetarian" value="1"> Vegetarian
            </label>
            <label>
                <input type="checkbox" name="organic" value="1"> Organic
            </label>
        </fieldset>

        <!-- Submit -->
        <div>
            <a href="{{ route('products.index') }}">Cancel</a>
            <button type="submit">Create Product</button>
        </div>

        <!-- Error Display -->
        @if ($errors->any())
        <ul>
            @foreach($errors->all as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

    </form>
</x-layout>
