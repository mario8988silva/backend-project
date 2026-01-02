@props(['name', 'label' => null])

<div class="flex items-right gap-2">
    <input 
        type="text" 
        name="{{ $name }}" 
        value="{{ request($name) }}" 
        class="input w-full"
        placeholder="{{ $label ?? ucfirst($name) }}"
    >
</div>
