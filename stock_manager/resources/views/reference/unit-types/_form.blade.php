<x-layout>
    <x-form 
        :title="isset($unit_type) ? 'Edit Unit Type' : 'Create New Unit Type'"
        :action="isset($unit_type) ? route('unit-types.update', $unit_type) : route('unit-types.store')"
        :method="isset($unit_type) ? 'PUT' : 'POST'"
        :cancel="isset($unit_type) ? route('unit-types.show', $unit_type) : route('unit-types.index')"
        :submit="isset($unit_type) ? 'Update Unit Type' : 'Create Unit Type'"
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
                value="{{ old('name', $unit_type->name ?? '') }}"
                class="{{ $errors->has('name') ? 'input-error' : '' }}"
            >
        </div>

        {{-- SYMBOL --}}
        <div>
            <label for="symbol">Symbol:</label>
            <input 
                type="text"
                id="symbol"
                name="symbol"
                maxlength="10"
                value="{{ old('symbol', $unit_type->symbol ?? '') }}"
                class="{{ $errors->has('symbol') ? 'input-error' : '' }}"
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
            >{{ old('description', $unit_type->description ?? '') }}</textarea>
        </div>

    </x-form>
</x-layout>
