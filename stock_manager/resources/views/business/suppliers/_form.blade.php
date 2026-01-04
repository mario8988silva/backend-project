<x-layout>
    <x-form 
        :title="isset($supplier) ? 'Edit Supplier' : 'Create New Supplier'"
        :action="isset($supplier) ? route('suppliers.update', $supplier) : route('suppliers.store')"
        :method="isset($supplier) ? 'PUT' : 'POST'"
        :cancel="isset($supplier) ? route('suppliers.show', $supplier) : route('suppliers.index')"
        :submit="isset($supplier) ? 'Update Supplier' : 'Create Supplier'"
    >

        {{-- NAME --}}
        <div>
            <label for="name">Name*:</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                required
                value="{{ old('name', $supplier->name ?? '') }}"
                class="{{ $errors->has('name') ? 'input-error' : '' }}"
            >
        </div>

        {{-- PHONE --}}
        <div>
            <label for="phone">Phone:</label>
            <input 
                type="text" 
                id="phone" 
                name="phone"
                value="{{ old('phone', $supplier->phone ?? '') }}"
                class="{{ $errors->has('phone') ? 'input-error' : '' }}"
            >
        </div>

        {{-- EMAIL --}}
        <div>
            <label for="email">Email:</label>
            <input 
                type="email" 
                id="email" 
                name="email"
                value="{{ old('email', $supplier->email ?? '') }}"
                class="{{ $errors->has('email') ? 'input-error' : '' }}"
            >
        </div>

        {{-- ADDRESS --}}
        <div>
            <label for="address">Address:</label>
            <input 
                type="text" 
                id="address" 
                name="address"
                value="{{ old('address', $supplier->address ?? '') }}"
                class="{{ $errors->has('address') ? 'input-error' : '' }}"
            >
        </div>

        {{-- NOTES --}}
        <div>
            <label for="notes">Notes:</label>
            <textarea 
                id="notes" 
                name="notes" 
                rows="4"
                class="{{ $errors->has('notes') ? 'input-error' : '' }}"
            >{{ old('notes', $supplier->notes ?? '') }}</textarea>
        </div>

    </x-form>
</x-layout>
