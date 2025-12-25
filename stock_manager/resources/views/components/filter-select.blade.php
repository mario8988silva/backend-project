@props([
    'name',
    'label' => null,
    'options' => [],
    'valueField' => 'id',
    'textField' => 'name',
])

<td>
    <select name="{{ $name }}">
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
</td>
