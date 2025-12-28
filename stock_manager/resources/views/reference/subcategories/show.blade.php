<x-show :title="$subcategory->name" :editRoute="route('subcategories.edit', $subcategory)" :deleteRoute="route('subcategories.destroy', $subcategory)" :indexRoute="route('subcategories.index')" :fields="[
        'ID' => $subcategory->id,
        'Name' => $subcategory->name,
        'Description' => $subcategory->description ?? '—',
        'Category' => $subcategory->category->name ?? '—',
        'Family' => $subcategory->category->family->name ?? '—',
        'Products Count' => $subcategory->products->count(),
        'Created At' => $subcategory->created_at->format('Y-m-d H:i'),
        'Updated At' => $subcategory->updated_at->format('Y-m-d H:i'),
    ]">
    @if($subcategory->products->count())
    <h3>Products</h3>
    <ul>
        @foreach($subcategory->products as $product)
        <li>
            <a href="{{ route('products.show', $product) }}">
                {{ $product->name }}
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</x-show>
