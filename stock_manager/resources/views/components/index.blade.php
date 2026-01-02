@props([
'title',
'columns',
'filtersLabels' => [],
'filters' => [],
'items' => [],
])

@php
function getValue($item, $path) {
foreach (explode('.', $path) as $segment) {
if (!isset($item->{$segment})) {
return null;
}
$item = $item->{$segment};
}
return $item;
}

$fullRouteName = request()->route()->getName(); // "products.index"
$baseRouteName = str_replace('.index', '', $fullRouteName); // "products"
@endphp

<x-layout>

    {{-- Page Title --}}
    <h2 class="text-2xl font-semibold tracking-tight mb-6">
        {{ $title }}
    </h2>

    {{-- Filters --}}
    <div class="mb-8">
        <x-filters :filtersLabels="$filtersLabels" :filters="$filters" />
    </div>

    {{-- Data Table --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-x-auto">
        <table class="min-w-full text-sm table-striped">
            <thead class="bg-gray-50 text-gray-600 border-b">
                <tr>
                    @foreach($columns as [$column, $label])
                    <th class="px-4 py-2 text-left whitespace-nowrap font-medium">
                        <x-sort-links :column="$column" :label="$label" :route="$fullRouteName" />
                    </th>
                    @endforeach

                    <th class="px-4 py-2 font-medium whitespace-nowrap">Delete</th>
                    <th class="px-4 py-2 font-medium whitespace-nowrap">Edit</th>
                    <th class="px-4 py-2 font-medium whitespace-nowrap">See</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach($items as $item)
                <tr>
                    @foreach($columns as [$path, $label])
                    @php $value = getValue($item, $path); @endphp

                    <td class="px-4 py-2 whitespace-nowrap">
                        @if(is_bool($value))
                        {{ $value ? '✔' : '' }}
                        @elseif($value instanceof \Carbon\Carbon)
                        {{ $value->format('Y/m/d g:i a') }}
                        @else
                        {{ $value ?? 'x' }}
                        @endif
                    </td>
                    @endforeach

                    {{-- Actions --}}
                    <td>
                        <x-delete-button :action="route($baseRouteName . '.destroy', $item)" :message="'Delete ' . ($item->name ?? $item->id) . '?'" />
                    </td>

                    <td>
                        <a href="{{ route($baseRouteName . '.edit', $item) }}">Edit</a>
                    </td>

                    <td>
                        <a href="{{ route($baseRouteName . '.show', $item) }}">See</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</x-layout>
