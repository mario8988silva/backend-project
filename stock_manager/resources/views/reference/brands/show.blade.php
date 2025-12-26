<x-show :title="$brand->name" :editRoute="route('brands.edit', $brand)" :deleteRoute="route('brands.destroy', $brand)" :fields="[
        'ID' => $brand->id,
        'Name' => $brand->name,
        'Country' => $brand->country ?? '—',
        'Description' => $brand->description ?? '—',
        'Products Count' => $brand->products->count(),
        'Created At' => $brand->created_at->format('Y-m-d H:i'),
        'Updated At' => $brand->updated_at->format('Y-m-d H:i'),
    ]">
    @if($brand->products->count())
    <h3>Products</h3>
    <ul>
        @foreach($brand->products as $product)
        <li>
            <a href="{{ route('products.show', $product) }}">
                {{ $product->name }}
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</x-show>
