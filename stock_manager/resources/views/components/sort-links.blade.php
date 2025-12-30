@props(['column', 'label', 'route' => null])


@php
$routeName = $route ?? request()->route()->getName();

$ascUrl = route($routeName, array_merge(request()->all(), [
'sort' => $column,
'direction' => 'asc'
]));

$descUrl = route($routeName, array_merge(request()->all(), [
'sort' => $column,
'direction' => 'desc'
]));
@endphp


{{ $label }}
<a href="{{ $ascUrl }}">⬇</a>
<a href="{{ $descUrl }}">⬆</a>
