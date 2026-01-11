@props([
'title',
'columns',
'items' => [],
'filtersLabels' => [],
'filters' => [],
'submitLabel' => 'Submit Button',
'sessionQuantities' => [],
])

@php
$getOrderValue = function ($item, $path) {
foreach (explode('.', $path) as $segment) {
if (!isset($item->{$segment})) {
return null;
}
$item = $item->{$segment};
}
return $item;
};
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

    {{-- FULL FORM --}}
    <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Submit Button --}}
        <button type="submit" class="btn-primary">
            {{ $submitLabel }}
        </button>

        {{-- Data Table --}}
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-x-auto">
            <table class="min-w-full text-sm table-striped">
                <thead class="bg-gray-50 text-gray-600 border-b">
                    <tr>
                        <th class="px-4 py-2 font-medium">Stock</th>
                        <th class="px-4 py-2 font-medium">Actions</th>
                        <th class="px-4 py-2 font-medium">Ordered</th>

                        @foreach($columns as [$column, $label])
                        <th class="px-4 py-2 font-medium">{{ $label }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach($items as $item)

                    @php
                    $initial = $sessionQuantities[$item->id] ?? 0;
                    @endphp

                    <tr data-product-id="{{ $item->id }}">

                        {{-- STOCK --}}
                        <td class="px-4 py-2 whitespace-nowrap">
                            {{ $item->stocks->sum('quantity') }}
                        </td>

                        {{-- ACTIONS --}}
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="flex items-center gap-2">

                                <button type="button" class="btn-secondary px-3" onclick="orderTable.decrement({{ $item->id }})">–</button>

                                <button type="button" class="btn-secondary px-3" onclick="orderTable.increment({{ $item->id }})">+</button>

                                <button type="button" class="btn-secondary px-3" onclick="orderTable.openDialog({{ $item->id }})">
                                    Set
                                </button>
                            </div>

                            {{-- Hidden input that gets submitted --}}
                            <input type="hidden" class="product-input" name="products[{{ $item->id }}]" value="{{ $initial }}">

                            {{-- Modal --}}
                            <dialog id="dialog-{{ $item->id }}" class="modal p-0 rounded-lg shadow-lg">
                                <form method="dialog" class="card max-w-sm">
                                    <h3 class="mb-3">Set Quantity</h3>

                                    <input type="number" min="0" id="dialog-input-{{ $item->id }}" class="input mb-4">

                                    <div class="flex justify-end gap-3">
                                        <button type="button" class="btn-secondary" onclick="document.getElementById('dialog-{{ $item->id }}').close()">
                                            Cancel
                                        </button>

                                        <button type="button" class="btn-primary" onclick="orderTable.applyDialog({{ $item->id }})">
                                            Apply
                                        </button>
                                    </div>
                                </form>
                            </dialog>
                        </td>

                        {{-- ORDERED --}}
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="product-ordered">{{ $initial }}</span>
                        </td>


                        {{-- DYNAMIC COLUMNS --}}
                        @foreach($columns as [$path, $label])
                        @php $value = $getOrderValue($item, $path); @endphp

                        <td class="px-4 py-2 whitespace-nowrap">
                            @if(is_bool($value))
                            {{ $value ? '✔' : '' }}
                            @elseif($value instanceof \Carbon\Carbon)
                            {{ $value->format('Y/m/d g:i a') }}
                            @else
                            {{ $value ?? '—' }}
                            @endif
                        </td>
                        @endforeach

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </form>

</x-layout>
