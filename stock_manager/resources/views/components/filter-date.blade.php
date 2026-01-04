@props([
    'name',
    'label' => null,
])

<div>
    <label class="text-sm font-medium text-gray-700">
        {{ $label ?? ucfirst(str_replace('_', ' ', $name)) }}
    </label>

    <input 
        type="date" 
        name="{{ $name }}" 
        value="{{ request($name) }}"
        class="input w-full"
    >
</div>
