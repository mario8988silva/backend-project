@props(['column', 'label'])

@php
$ascUrl = route('products.index', array_merge(request()->all(), ['sort' => $column, 'direction' => 'asc']));
$descUrl = route('products.index', array_merge(request()->all(), ['sort' => $column, 'direction' => 'desc']));
@endphp

{{ $label }}
<a href="{{ $ascUrl }}">⬇</a>
<a href="{{ $descUrl }}">⬆</a>
