<x-layout>
    <x-form :title="isset($category) ? 'Edit Category' : 'Create New Category'" :action="isset($category) ? route('categories.update', $category) : route('categories.store')" :method="isset($category) ? 'PUT' : 'POST'" :cancel="isset($category) ? route('categories.show', $category) : route('categories.index')" :submit="isset($category) ? 'Update Category' : 'Create Category'">

        {{-- FAMILY --}}
        <div>
            <label for="family_id">Family:</label>
            <select id="family_id" name="family_id" class="{{ $errors->has('family_id') ? 'input-error' : '' }}">
                <option value="">-- Select Family --</option>

                @foreach($families as $family)
                <option value="{{ $family->id }}" {{ $family->id == old('family_id', $category->family_id ?? '') ? 'selected' : '' }}>
                    {{ $family->name }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- NAME --}}
        <div>
            <label for="name">Name*:</label>
            <input type="text" id="name" name="name" required maxlength="100" value="{{ old('name', $category->name ?? '') }}" class="{{ $errors->has('name') ? 'input-error' : '' }}">
        </div>

        {{-- DESCRIPTION --}}
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" maxlength="255" rows="4" class="{{ $errors->has('description') ? 'input-error' : '' }}">{{ old('description', $category->description ?? '') }}</textarea>
        </div>

    </x-form>
</x-layout>
