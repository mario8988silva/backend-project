<x-show :title="$representative->name" 
:editRoute="route('representatives.edit', $representative)" 
:deleteRoute="route('representatives.destroy', $representative)" 
:indexRoute="route('suppliers.index')"
:fields="[
        'ID' => $representative->id,
        'Name' => $representative->name,
        'Phone' => $representative->phone ?? '—',
        'Email' => $representative->email ?? '—',
        'Supplier' => $representative->supplier->name ?? '—',
        'Notes' => $representative->notes ?? '—',
        'Created At' => $representative->created_at->format('Y-m-d H:i'),
        'Updated At' => $representative->updated_at->format('Y-m-d H:i'),
    ]">
    @if($representative->supplier)
    <h3>Supplier</h3>
    <ul>
        <li>
            <a href="{{ route('suppliers.show', $representative->supplier) }}">
                {{ $representative->supplier->name }}
            </a>
        </li>
    </ul>
    @endif
</x-show>
