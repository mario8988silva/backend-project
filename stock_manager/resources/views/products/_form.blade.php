<x-layout>


    {{---------------------------------------------------------
    <h3>Debug: brands</h3>
    <pre>
    @foreach($brands as $brand)
    {{ $brand->id }} - {{ $brand->name }} - {{ $brand->country }} - {{ $brand->description }}
    @endforeach
    </pre>

    <h3>Debug: categories</h3>
    <pre>
    @foreach($categories as $category)
    {{ $category->id }} - {{ $category->family_id }} - {{ $category->name }} - {{ $category->description }}
    @endforeach
    </pre>
    <h3>Debug: ecoScores</h3>
    <pre>
    @foreach($eco_scores as $eco_score)
    {{ $eco_score->id }} - {{ $eco_score->grade }} - {{ $eco_score->color }} - {{ $eco_score->description }}
    @endforeach
    </pre>
    <h3>Debug: families</h3>
    <pre>
    @foreach($families as $family)
    {{ $family->id }} - {{ $family->name }} - {{ $family->description }}
    @endforeach
    </pre>
    <h3>Debug: ivaCategories</h3>
    <pre>
    @foreach($iva_categories as $ivaCategory)
    {{ $ivaCategory->id }} - {{ $ivaCategory->name }} - {{ $ivaCategory->rate }}% - {{ $ivaCategory->description }}
    @endforeach
    </pre>
    <h3>Debug: nutriScores</h3>
    <pre>
    @foreach($nutri_scores as $nutriScore)
    {{ $nutriScore->id }} - {{ $nutriScore->grade }} - {{ $nutriScore->color }} - {{ $nutriScore->description }}
    @endforeach
    </pre>
    <h3>Debug: subcategories</h3>
    <pre>
    @foreach($subcategories as $subcategory)
    {{ $subcategory->id }} - {{ $subcategory->category_id }} - {{ $subcategory->name }} - {{ $subcategory->description }}
    @endforeach
    </pre>
    <h3>Debug: unitTypes</h3>
    <pre>
    @foreach($unit_types as $unitType)
    {{ $unitType->id }} - {{ $unitType->name }} - {{ $unitType->symbol }} - {{ $unitType->description }}
    @endforeach
    </pre>-
    ---------------------------------------------------------}}
    <h2>{{ isset($product) ? 'Edit Product' : 'Create New Product' }}</h2>

    <form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST">
        @csrf
        @isset($product)
        @method('PUT')
        @endisset

        <!-- Barcode -->
        <div>
            <label for="barcode">Barcode: </label>
            <input type="text" id="barcode" name="barcode" maxlength="45" placeholder="Optional barcode" value="{{ $product->barcode ?? old('barcode') }}" class="{{ $errors->has('barcode') ? 'input-error' : '' }}">
        </div>

        <!-- product name -->
        <div>
            <label for="name">Product Name*: </label>
            <input type="text" id="name" name="name" value="{{ $product->name ?? old('name') }}" class="{{ $errors->has('name') ? 'input-error' : '' }}" required>
        </div>

        <!-- Image -->
        <div>
            <label for="image">Image URL: </label>
            <input type="text" name="image" id="image" maxlength="255" placeholder="Optional image URL" value="{{ $product->image ?? old('image') }}">

        </div>

        <!-- Description -->
        <div>
            <label for="description">Description: </label>
            <textarea name="description" id="description" rows="5" class="{{ $errors->has('description') ? 'input-error' : '' }}">{{ $product->description ?? old('description') }}</textarea>
        </div>

        <!-- Foreign Keys -->
        <div>
            <div>
                <label for="unit_type_id">Unit Type: </label>
                <select name="unit_type_id" id="unit_type_id" class="{{ $errors->has('unit_type_id') ? 'input-error' : '' }}">
                    <option value="" disabled selected>-- Select --</option>
                    @foreach($unit_types as $unitType)
                    <option value="{{ $unitType->id }}" {{ $unitType->id == old('unit_type_id', $product->unit_type_id ?? '') ? 'selected' : '' }}>{{ $unitType->symbol }} - {{ $unitType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="iva_category_id">IVA Category: </label>
                <select name="iva_category_id" id="iva_category_id" class="{{ $errors->has('iva_category_id') ? 'input-error' : '' }}">
                    <option value="" disabled selected>-- Select --</option>
                    @foreach($iva_categories as $ivaCategory)
                    <option value="{{ $ivaCategory->id }}" {{ $ivaCategory->id == old('iva_category_id', $product->iva_category_id ?? '') ? 'selected' : '' }}>{{ $ivaCategory->rate }}%</option>
                    @endforeach

                </select>
            </div>

            <div>
                <label for="brand_id">Brand</label>
                <select name="brand_id" id="brand_id" class="{{ $errors->has('brand_id') ? 'input-error' : '' }}">
                    <option value="">-- Select --</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ $brand->id == old('brand_id', $product->brand_id ?? '') ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="subcategory_id">Subcategory: </label>
                <select name="subcategory_id" id="subcategory_id" class="{{ $errors->has('subcategory_id') ? 'input-error' : '' }}">
                    <option value="">-- Select --</option>
                    @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ $subcategory->id == old('subcategory_id', $product->subcategory_id ?? '') ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="nutri_score_id">Nutri Score: </label>
                <select name="nutri_score_id" id="nutri_score_id" class="{{ $errors->has('nutri_score_id') ? 'input-error' : '' }}">
                    <option value="">-- Select --</option>
                    @foreach($nutri_scores as $nutriScore)
                    <option value="{{ $nutriScore->id }}" {{ $nutriScore->id == old('nutri_score_id', $product->nutri_score_id ?? '') ? 'selected' : '' }}>{{ $nutriScore->grade }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="eco_score_id">Eco Score: </label>
                <select name="eco_score_id" id="eco_score_id" class="{{ $errors->has('eco_score_id') ? 'input-error' : '' }}">
                    <option value="">-- Select --</option>
                    @foreach($eco_scores as $ecoScore)
                    <option value="{{ $ecoScore->id }}" {{ $ecoScore->id == old('eco_score_id', $product->eco_score_id ?? '') ? 'selected' : '' }}>{{ $ecoScore->grade }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Attributes -->
        <fieldset>
            <legend>Attributes</legend>
            <label>
                <input type="checkbox" name="sugar_free" value="1" {{ old('sugar_free', $product->sugar_free ?? false) ? 'checked' : '' }}>Sugar Free:
            </label>
            <label>
                <input type="checkbox" name="gluten_free" value="1" {{ old('gluten_free', $product->gluten_free ?? false) ? 'checked' : '' }}>Gluten Free:
            </label>
            <label>
                <input type="checkbox" name="lactose_free" value="1" {{ old('lactose_free', $product->lactose_free ?? false) ? 'checked' : '' }}>Lactose Free:
            </label>
            <label>
                <input type="checkbox" name="vegan" value="1" {{ old('vegan', $product->vegan ?? false) ? 'checked' : '' }}>Vegan:
            </label>
            <label>
                <input type="checkbox" name="vegetarian" value="1" {{ old('vegetarian', $product->vegetarian ?? false) ? 'checked' : '' }}>Vegetarian:
            </label>
            <label>
                <input type="checkbox" name="organic" value="1" {{ old('organic', $product->organic ?? false) ? 'checked' : '' }}>Organic:
            </label>
        </fieldset>

        <!-- Submit -->
        <div>
            @if(isset($product))
            <a href="{{ route('products.show', $product->id) }}">Cancel</a>
            @else
            <a href="{{ route('products.index') }}">Cancel</a>
            @endif

            <button type="submit">
                {{ isset($product) ? 'Update Product' : 'Create Product' }}
            </button>
        </div>

        <!-- Error Display -->
        @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li class="my-2 text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
        @endif

    </form>
</x-layout>
