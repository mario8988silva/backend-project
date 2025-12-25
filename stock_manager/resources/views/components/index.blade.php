@props([
    'title',
    'columns',     // array: [['column', 'Label'], ...]
    'filters' => null, // Blade slot for filters
])

<x-layout>
    <h2>{{ $title }}</h2>

    <form method="GET">
        <table>
            <thead>
                <tr>
                    @foreach($filters as $filter)
                        {!! $filter !!}
                    @endforeach
                </tr>
            </thead>
        </table>

        <button type="submit">Apply Filters</button>
        <a href="{{ url()->current() }}">Reset</a>
    </form>

    <table>
        <thead>
            <tr>
                @foreach($columns as [$column, $label])
                    <th>
                        <x-sort-links :column="$column" :label="$label" />
                    </th>
                @endforeach

                <th>edit</th>
                <th>delete</th>
                <th>see</th>
            </tr>
        </thead>

        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</x-layout>
