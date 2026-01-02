@props([
    'name',
    'label' => null,
    'options' => [],
    'valueField' => 'id',
    'textField' => 'name',
])

<div>
    <select name="{{ $name }}" class="input w-full">
        <option value="">-- {{ $label ?? ucfirst($name) }} --</option>

        @foreach($options as $option)
            @php
                $value = $option[$valueField];
                $text = $option[$textField];
            @endphp

            <option value="{{ $value }}" 
                {{ request($name) == $value ? 'selected' : '' }}>
                {{ $text }}
            </option>
        @endforeach
    </select>
</div>
