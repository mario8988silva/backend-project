<x-layout>
    <h2>Create Page</h2>

    <form action="" method="POST">
        @csrf

        <!-- product name -->
        <div>
            <label for="name">Product Name *:</label>
            <input 
            type="text" 
            id="name" 
            name="name" 
            required
            >
        </div>

        <!-- Barcode -->
        <div>
            <label for="barcode">Barcode</label>
            <input 
            type="text" 
            name="barcode" 
            id="barcode" 
            maxlength="45" 
            placeholder="Optional barcode"
            >
        </div>

        <!-- Image -->
        <div>
            <label for="image">Image URL</label>
            <input 
            type="text" 
            name="image" 
            id="image" 
            maxlength="255" 
            placeholder="Optional image URL"
            >
        </div>

        <!-- Description -->
        <div>
            <label for="description">Description</label>
            <textarea 
            name="description" 
            id="description" 
            rows="3"
            ></textarea>
        </div>
        {{--
        <!-- Foreign Keys -->
        <div>
            <div>
                <label for="unit_type_id">Unit Type</label>
                <select name="unit_type_id" id="unit_type_id">
                    <option value="">-- Select --</option>
                    @foreach($unitTypes as $unitType)
                        <option value="{{ $unitType->id }}">{{ $unitType->name }}</option>
        @endforeach
        </select>
        </div>

        <div>
            <label for="iva_category_id">IVA Category</label>
            <select name="iva_category_id" id="iva_category_id">
                <option value="">-- Select --</option>
                @foreach($ivaCategories as $ivaCategory)
                <option value="{{ $ivaCategory->id }}">{{ $ivaCategory->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="brand_id">Brand</label>
            <select name="brand_id" id="brand_id">
                <option value="">-- Select --</option>
                @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="subcategory_id">Subcategory</label>
            <select name="subcategory_id" id="subcategory_id">
                <option value="">-- Select --</option>
                @foreach($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="nutri_score_id">Nutri Score</label>
            <select name="nutri_score_id" id="nutri_score_id">
                <option value="">-- Select --</option>
                @foreach($nutriScores as $nutriScore)
                <option value="{{ $nutriScore->id }}">{{ $nutriScore->label }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="eco_score_id">Eco Score</label>
            <select name="eco_score_id" id="eco_score_id">
                <option value="">-- Select --</option>
                @foreach($ecoScores as $ecoScore)
                <option value="{{ $ecoScore->id }}">{{ $ecoScore->label }}</option>
                @endforeach
            </select>
        </div>
        </div>

        <!-- Expiry Date -->
        <div>
            <label for="expiry_date">Expiry Date</label>
            <input type="date" name="expiry_date" id="expiry_date">
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
            <button type="submit" class="btn-primary">Create Product</button>
            <button type="" class="btn-primary">Cancel</button>
        </div>
        --}}
    </form>
</x-layout>
