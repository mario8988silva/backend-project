@php
$currentRoute = request()->route()->getName(); // e.g. "products.index"

$section = explode('.', $currentRoute)[0]; // "products"

$sections = config('sections');

$indexOptions = $sections[$section]['index'] ?? [];
$createOptions = $sections[$section]['create'] ?? [];
@endphp

<ul>
    <li>
        See All...
        <select onchange="if(this.value) window.location.href=this.value;">
            <option value=""></option>

            @foreach ($indexOptions as [$route, $label])
            <option value="{{ route($route) }}">
                {{ $label }}
            </option>
            @endforeach
        </select>
    </li>

    <li>
        Add New...
        <select onchange="if(this.value) window.location.href=this.value;">
            <option value=""></option>

            @foreach ($createOptions as [$route, $label])
            <option value="{{ route($route) }}">
                {{ $label }}
            </option>
            @endforeach
        </select>
    </li>
</ul>

<hr>
