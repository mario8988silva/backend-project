<x-show
    :title="$location->name"
    :editRoute="route('locations.edit', $location)"
    :deleteRoute="route('locations.destroy', $location)"
    :fields="[
        'ID' => $location->id,
        'Name' => $location->name,
        'Address' => $location->address ?? '—',
        'Type' => $location->type ?? '—',
        'Stocks Count' => $location->stocks->count(),
        'Created At' => $location->created_at->format('Y-m-d H:i'),
        'Updated At' => $location->updated_at->format('Y-m-d H:i'),
    ]"
>
    @if($location->stocks->count())
        <h3>Stock Entries</h3>
        <ul>
            @foreach($location->stocks as $stock)
                <li>
                    <a href="{{ route('stocks.show', $stock) }}">
                        Stock #{{ $stock->id }} — {{ $stock->product->name ?? 'Unknown Product' }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</x-show>
