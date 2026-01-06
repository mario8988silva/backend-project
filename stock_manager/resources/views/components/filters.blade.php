@props([
'filtersLabels' => [],
'filters' => [],
])

<form method="GET" class="space-y-6">

    <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm space-y-6">

        {{-- Responsive Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 w-full">
            @foreach (array_map(null, $filtersLabels, $filters) as [$label, $input])
            <div class="flex flex-col gap-1 w-full min-w-0">
                <label class="text-sm font-medium text-gray-700">
                    {{ $label }}
                </label>

                {!! $input !!}
            </div>
            @endforeach
        </div>

        {{-- Buttons --}}
        <div class="flex flex-col sm:flex-row gap-3 pt-2">
            <a href="{{ url()->current() }}" class="btn-secondary w-full sm:w-auto">Reset</a>
            <button class="btn-primary w-full sm:w-auto">Apply Filters</button>

        </div>


    </div>

</form>
