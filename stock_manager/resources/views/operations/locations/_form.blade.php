<x-layout>
    <x-form 
        :title="isset($location) ? 'Edit Location' : 'Create New Location'"
        :action="isset($location) ? route('locations.update', $location) : route('locations.store')"
        :method="isset($location) ? 'PUT' : 'POST'"
        :cancel="isset($location) ? route('locations.show', $location) : route('locations.index')"
        :submit="isset($location) ? 'Update Location' : 'Create Location'"
    >

        {{-- NAME --}}
        <div>
            <label for="name">Name*:</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                required
                value="{{ old('name', $location->name ?? '') }}"
                class="{{ $errors->has('name') ? 'input-error' : '' }}"
            >
        </div>

        {{-- ADDRESS --}}
        <div>
            <label for="address">Address:</label>
            <input 
                type="text" 
                id="address" 
                name="address"
                value="{{ old('address', $location->address ?? '') }}"
                class="{{ $errors->has('address') ? 'input-error' : '' }}"
            >
        </div>

        {{-- TYPE --}}
        <div>
            <label for="type">Type:</label>
            <input 
                type="text" 
                id="type" 
                name="type"
                value="{{ old('type', $location->type ?? '') }}"
                class="{{ $errors->has('type') ? 'input-error' : '' }}"
            >
        </div>

    </x-form>
</x-layout>
