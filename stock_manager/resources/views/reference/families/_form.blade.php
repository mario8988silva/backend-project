<x-layout>
    <x-form 
        :title="isset($family) ? 'Edit Family' : 'Create New Family'"
        :action="isset($family) ? route('families.update', $family) : route('families.store')"
        :method="isset($family) ? 'PUT' : 'POST'"
        :cancel="isset($family) ? route('families.show', $family) : route('families.index')"
        :submit="isset($family) ? 'Update Family' : 'Create Family'"
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
                value="{{ old('name', $family->name ?? '') }}"
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
            >{{ old('description', $family->description ?? '') }}</textarea>
        </div>

    </x-form>
</x-layout>
