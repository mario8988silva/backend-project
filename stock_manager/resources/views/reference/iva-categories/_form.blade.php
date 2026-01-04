<x-layout>
    <x-form 
        :title="isset($iva_category) ? 'Edit IVA Category' : 'Create New IVA Category'"
        :action="isset($iva_category) ? route('iva-categories.update', $iva_category) : route('iva-categories.store')"
        :method="isset($iva_category) ? 'PUT' : 'POST'"
        :cancel="isset($iva_category) ? route('iva-categories.show', $iva_category) : route('iva-categories.index')"
        :submit="isset($iva_category) ? 'Update IVA Category' : 'Create IVA Category'"
    >

        {{-- NAME --}}
        <div>
            <label for="name">Name*:</label>
            <input 
                type="text"
                id="name"
                name="name"
                required
                maxlength="255"
                value="{{ old('name', $iva_category->name ?? '') }}"
                class="{{ $errors->has('name') ? 'input-error' : '' }}"
            >
        </div>

        {{-- RATE --}}
        <div>
            <label for="rate">Rate (%)*:</label>
            <input 
                type="number"
                id="rate"
                name="rate"
                required
                min="0"
                max="100"
                step="0.01"
                value="{{ old('rate', $iva_category->rate ?? '') }}"
                class="{{ $errors->has('rate') ? 'input-error' : '' }}"
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
            >{{ old('description', $iva_category->description ?? '') }}</textarea>
        </div>

    </x-form>
</x-layout>
