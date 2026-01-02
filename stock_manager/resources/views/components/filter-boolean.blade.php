@props(['name'])

<div>
    <input 
        type="checkbox" 
        name="{{ $name }}" 
        value="1"
        {{ request($name) == '1' ? 'checked' : '' }}
    >
</div>
