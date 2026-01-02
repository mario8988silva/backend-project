@php
$currentRoute = request()->route()->getName();
$section = explode('.', $currentRoute)[0];
$sections = config('sections');

$indexOptions = $sections[$section]['index'] ?? [];
$createOptions = $sections[$section]['create'] ?? [];
@endphp

<div class="flex flex-wrap items-center gap-6 mb-6">

    <div class="flex items-center gap-2 flex-shrink-0">
        <span class="text-sm font-medium text-gray-700">See All…</span>
        <select class="select w-40" onchange="if(this.value) window.location.href=this.value;">
            <option value=""></option>
            @foreach ($indexOptions as [$route, $label])
            <option value="{{ route($route) }}">{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex items-center gap-2 flex-shrink-0">
        <span class="text-sm font-medium text-gray-700">Add New…</span>
        <select class="select w-40" onchange="if(this.value) window.location.href=this.value;">
            <option value=""></option>
            @foreach ($createOptions as [$route, $label])
            <option value="{{ route($route) }}">{{ $label }}</option>
            @endforeach
        </select>
    </div>

</div>
