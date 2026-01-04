<x-layout>
    <x-form 
        :title="isset($representative) ? 'Edit Representative' : 'Create New Representative'"
        :action="isset($representative) ? route('representatives.update', $representative) : route('representatives.store')"
        :method="isset($representative) ? 'PUT' : 'POST'"
        :cancel="isset($representative) ? route('representatives.show', $representative) : route('representatives.index')"
        :submit="isset($representative) ? 'Update Representative' : 'Create Representative'"
    >

        {{-- SUPPLIER --}}
        <div>
            <label for="supplier_id">Supplier:</label>
            <select 
                id="supplier_id" 
                name="supplier_id"
                class="{{ $errors->has('supplier_id') ? 'input-error' : '' }}"
            >
                <option value="">-- Select Supplier --</option>

                @foreach($suppliers as $supplier)
                    <option 
                        value="{{ $supplier->id }}"
                        {{ $supplier->id == old('supplier_id', $representative->supplier_id ?? '') ? 'selected' : '' }}
                    >
                        {{ $supplier->name }}
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
                value="{{ old('name', $representative->name ?? '') }}"
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
                value="{{ old('phone', $representative->phone ?? '') }}"
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
                value="{{ old('email', $representative->email ?? '') }}"
                class="{{ $errors->has('email') ? 'input-error' : '' }}"
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
            >{{ old('notes', $representative->notes ?? '') }}</textarea>
        </div>

    </x-form>
</x-layout>
