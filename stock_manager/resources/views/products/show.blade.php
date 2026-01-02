
<x-show 
    :title="$product->name"
    :image="$product->image"
    :editRoute="route('products.edit', $product)"
    :deleteRoute="route('products.destroy', $product)"
    :indexRoute="route('products.index')"
    :fields="[
        'ID' => $product->id,
        'Barcode' => $product->barcode ?? '—',
        'Name' => $product->name,
        'Unit Type' => $product->unit_type->name ?? '—',
        'IVA Category' => ($product->iva_category->rate ?? '—') . '%',
        'Brand' => $product->brand->name ?? '—',
        'Subcategory' => $product->subcategory->name ?? '—',
        'Category' => $product->subcategory->category->name ?? '—',
        'Family' => $product->subcategory->category->family->name ?? '—',
        'Nutri Score' => $product->nutri_score_id ?? '—',
        'Eco Score' => $product->eco_score_id ?? '—',
        'Sugar Free' => $product->sugar_free ? 'Yes' : 'No',
        'Gluten Free' => $product->gluten_free ? 'Yes' : 'No',
        'Lactose Free' => $product->lactose_free ? 'Yes' : 'No',
        'Vegan' => $product->vegan ? 'Yes' : 'No',
        'Vegetarian' => $product->vegetarian ? 'Yes' : 'No',
        'Organic' => $product->organic ? 'Yes' : 'No',
        'Created At' => $product->created_at->format('Y-m-d H:i'),
        'Updated At' => $product->updated_at->format('Y-m-d H:i'),
    ]"
/>
