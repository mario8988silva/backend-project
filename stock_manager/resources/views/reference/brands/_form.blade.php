<x-layout>
    <x-form 
        :title="isset($brand) ? 'Edit Brand' : 'Create New Brand'"
        :action="isset($brand) ? route('brands.update', $brand) : route('brands.store')"
        :method="isset($brand) ? 'PUT' : 'POST'"
        :cancel="isset($brand) ? route('brands.show', $brand) : route('brands.index')"
        :submit="isset($brand) ? 'Update Brand' : 'Create Brand'"
    >

        {{-- NAME --}}
        <div>
            <label for="name">Name*:</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                required 
                maxlength="100"
                value="{{ old('name', $brand->name ?? '') }}"
                class="{{ $errors->has('name') ? 'input-error' : '' }}"
            >
        </div>

        {{-- COUNTRY --}}
        <div>
            <label for="country">Country:</label>
            <input 
                type="text" 
                id="country" 
                name="country" 
                maxlength="100"
                value="{{ old('country', $brand->country ?? '') }}"
                class="{{ $errors->has('country') ? 'input-error' : '' }}"
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
            >{{ old('description', $brand->description ?? '') }}</textarea>
        </div>

    </x-form>
</x-layout>
