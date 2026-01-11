<x-layout>

    <x-form 
        :title="isset($product) ? 'Edit Product' : 'Create New Product'"
        :action="isset($product) ? route('products.update', $product) : route('products.store')"
        :method="isset($product) ? 'PUT' : 'POST'"
        :cancel="isset($product) ? route('products.show', $product) : route('products.index')"
        :submit="isset($product) ? 'Update Product' : 'Create Product'"
    >

        {{-- BARCODE --}}
        <div>
            <label for="barcode">Barcode:</label>
            <input 
                type="text" 
                id="barcode" 
                name="barcode" 
                maxlength="45" 
                placeholder="Optional barcode"
                value="{{ old('barcode', $product->barcode ?? '') }}"
                class="{{ $errors->has('barcode') ? 'input-error' : '' }}"
            >
        </div>

        {{-- NAME --}}
        <div>
            <label for="name">Product Name*:</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                required
                value="{{ old('name', $product->name ?? '') }}"
                class="{{ $errors->has('name') ? 'input-error' : '' }}"
            >
        </div>

        {{-- IMAGE --}}
        <div>
            <label for="image">Image URL:</label>
            <input 
                type="text" 
                id="image" 
                name="image" 
                maxlength="255"
                placeholder="Optional image URL"
                value="{{ old('image', $product->image ?? '') }}"
            >
        </div>

        {{-- DESCRIPTION --}}
        <div>
            <label for="description">Description:</label>
            <textarea 
                id="description" 
                name="description" 
                rows="5"
                class="{{ $errors->has('description') ? 'input-error' : '' }}"
            >{{ old('description', $product->description ?? '') }}</textarea>
        </div>

        {{-- FOREIGN KEYS --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

            <div>
                <label for="unit_type_id">Unit Type:</label>
                <select 
                    id="unit_type_id" 
                    name="unit_type_id"
                    class="{{ $errors->has('unit_type_id') ? 'input-error' : '' }}"
                >
                    <option value="">-- Select --</option>
                    @foreach($unit_types as $unitType)
                        <option 
                            value="{{ $unitType->id }}"
                            {{ $unitType->id == old('unit_type_id', $product->unit_type_id ?? '') ? 'selected' : '' }}
                        >
                            {{ $unitType->symbol }} - {{ $unitType->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="iva_category_id">IVA Category:</label>
                <select 
                    id="iva_category_id" 
                    name="iva_category_id"
                    class="{{ $errors->has('iva_category_id') ? 'input-error' : '' }}"
                >
                    <option value="">-- Select --</option>
                    @foreach($iva_categories as $ivaCategory)
                        <option 
                            value="{{ $ivaCategory->id }}"
                            {{ $ivaCategory->id == old('iva_category_id', $product->iva_category_id ?? '') ? 'selected' : '' }}
                        >
                            {{ $ivaCategory->rate }}%
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="brand_id">Brand:</label>
                <select 
                    id="brand_id" 
                    name="brand_id"
                    class="{{ $errors->has('brand_id') ? 'input-error' : '' }}"
                >
                    <option value="">-- Select --</option>
                    @foreach($brands as $brand)
                        <option 
                            value="{{ $brand->id }}"
                            {{ $brand->id == old('brand_id', $product->brand_id ?? '') ? 'selected' : '' }}
                        >
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="subcategory_id">Subcategory:</label>
                <select 
                    id="subcategory_id" 
                    name="subcategory_id"
                    class="{{ $errors->has('subcategory_id') ? 'input-error' : '' }}"
                >
                    <option value="">-- Select --</option>
                    @foreach($subcategories as $subcategory)
                        <option 
                            value="{{ $subcategory->id }}"
                            {{ $subcategory->id == old('subcategory_id', $product->subcategory_id ?? '') ? 'selected' : '' }}
                        >
                            {{ $subcategory->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="nutri_score_id">Nutri Score:</label>
                <select 
                    id="nutri_score_id" 
                    name="nutri_score_id"
                    class="{{ $errors->has('nutri_score_id') ? 'input-error' : '' }}"
                >
                    <option value="">-- Select --</option>
                    @foreach($nutri_scores as $nutriScore)
                        <option 
                            value="{{ $nutriScore->id }}"
                            {{ $nutriScore->id == old('nutri_score_id', $product->nutri_score_id ?? '') ? 'selected' : '' }}
                        >
                            {{ $nutriScore->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="eco_score_id">Eco Score:</label>
                <select 
                    id="eco_score_id" 
                    name="eco_score_id"
                    class="{{ $errors->has('eco_score_id') ? 'input-error' : '' }}"
                >
                    <option value="">-- Select --</option>
                    @foreach($eco_scores as $ecoScore)
                        <option 
                            value="{{ $ecoScore->id }}"
                            {{ $ecoScore->id == old('eco_score_id', $product->eco_score_id ?? '') ? 'selected' : '' }}
                        >
                            {{ $ecoScore->name }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

        {{-- ATTRIBUTES --}}
        <fieldset class="mt-4">
            <legend class="font-medium mb-2">Attributes</legend>

            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                <label><input type="checkbox" name="sugar_free" value="1" {{ old('sugar_free', $product->sugar_free ?? false) ? 'checked' : '' }}> Sugar Free</label>
                <label><input type="checkbox" name="gluten_free" value="1" {{ old('gluten_free', $product->gluten_free ?? false) ? 'checked' : '' }}> Gluten Free</label>
                <label><input type="checkbox" name="lactose_free" value="1" {{ old('lactose_free', $product->lactose_free ?? false) ? 'checked' : '' }}> Lactose Free</label>
                <label><input type="checkbox" name="vegan" value="1" {{ old('vegan', $product->vegan ?? false) ? 'checked' : '' }}> Vegan</label>
                <label><input type="checkbox" name="vegetarian" value="1" {{ old('vegetarian', $product->vegetarian ?? false) ? 'checked' : '' }}> Vegetarian</label>
                <label><input type="checkbox" name="organic" value="1" {{ old('organic', $product->organic ?? false) ? 'checked' : '' }}> Organic</label>
            </div>
        </fieldset>

    </x-form>

</x-layout>
