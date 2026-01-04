<x-show 
    :title="$iva_category->name"
    :editRoute="route('iva-categories.edit', $iva_category)"
    :deleteRoute="route('iva-categories.destroy', $iva_category)"
    :indexRoute="route('iva-categories.index')"
    :fields="[
        'ID' => $iva_category->id,
        'Name' => $iva_category->name,
        'Rate' => $iva_category->rate . '%',
        'Description' => $iva_category->description ?? '—',
        'Products Count' => $iva_category->products->count(),
        'Created At' => $iva_category->created_at->format('Y-m-d H:i'),
        'Updated At' => $iva_category->updated_at->format('Y-m-d H:i'),
    ]"
>
</x-show>
