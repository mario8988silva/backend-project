<x-show :title="$category->name" 
:editRoute="route('categories.edit', $category)" 
:deleteRoute="route('categories.destroy', $category)" 
:indexRoute="route('categories.index')"
:fields="[
        'ID' => $category->id,
        'Name' => $category->name,
        'Description' => $category->description ?? '—',
        'Family' => $category->family->name ?? '—',
        'Subcategories Count' => $category->subcategories->count(),
        'Suppliers Count' => $category->suppliers->count(),
        'Products Count' => $category->products->count(),
        'Created At' => $category->created_at->format('Y-m-d H:i'),
        'Updated At' => $category->updated_at->format('Y-m-d H:i'),
    ]">
    {{-- OPTIONAL EXTRA SECTION --}}
    @if($category->subcategories->count())
    <h3>Subcategories</h3>
    <ul>
        @foreach($category->subcategories as $sub)
        <li>
            <a href="{{ route('subcategories.show', $sub) }}">
                {{ $sub->name }}
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</x-show>
