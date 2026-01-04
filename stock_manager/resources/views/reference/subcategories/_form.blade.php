<x-layout>
    <x-form 
        :title="isset($subcategory) ? 'Edit Subcategory' : 'Create New Subcategory'"
        :action="isset($subcategory) ? route('subcategories.update', $subcategory) : route('subcategories.store')"
        :method="isset($subcategory) ? 'PUT' : 'POST'"
        :cancel="isset($subcategory) ? route('subcategories.show', $subcategory) : route('subcategories.index')"
        :submit="isset($subcategory) ? 'Update Subcategory' : 'Create Subcategory'"
    >

        {{-- CATEGORY --}}
        <div>
            <label for="category_id">Category:</label>
            <select 
                id="category_id" 
                name="category_id"
                class="{{ $errors->has('category_id') ? 'input-error' : '' }}"
            >
                <option value="">-- Select Category --</option>

                @foreach($categories as $category)
                    <option 
                        value="{{ $category->id }}"
                        {{ $category->id == old('category_id', $subcategory->category_id ?? '') ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- NAME --}}
        <div>
            <label for="name">Name*:</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                required 
                maxlength="100"
                value="{{ old('name', $subcategory->name ?? '') }}"
                class="{{ $errors->has('name') ? 'input-error' : '' }}"
            >
        </div>

        {{-- DESCRIPTION --}}
        <div>
            <label for="description">Description:</label>
            <textarea 
                id="description" 
                name="description" 
                maxlength="255" 
                rows="4"
                class="{{ $errors->has('description') ? 'input-error' : '' }}"
            >{{ old('description', $subcategory->description ?? '') }}</textarea>
        </div>

    </x-form>
</x-layout>
