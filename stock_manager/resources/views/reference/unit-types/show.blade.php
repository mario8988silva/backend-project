<x-show 
    :title="$unit_type->name"
    :editRoute="route('unit-types.edit', $unit_type)"
    :deleteRoute="route('unit-types.destroy', $unit_type)"
    :indexRoute="route('unit-types.index')"
    :fields="[
        'ID' => $unit_type->id,
        'Name' => $unit_type->name,
        'Symbol' => $unit_type->symbol ?? '—',
        'Description' => $unit_type->description ?? '—',
        'Products Count' => $unit_type->products->count(),
        'Created At' => $unit_type->created_at->format('Y-m-d H:i'),
        'Updated At' => $unit_type->updated_at->format('Y-m-d H:i'),
    ]"
>
</x-show>
