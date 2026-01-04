<x-show 
    :title="$family->name"
    :editRoute="route('families.edit', $family)"
    :indexRoute="route('families.index')"
    :deleteRoute="route('families.destroy', $family)"
    :fields="[
        'ID' => $family->id,
        'Name' => $family->name,
        'Description' => $family->description ?? '—',
        'Categories Count' => $family->categories->count(),
        'Created At' => $family->created_at->format('Y-m-d H:i'),
        'Updated At' => $family->updated_at->format('Y-m-d H:i'),
    ]"
>
    @if($family->categories->count())
        <h3>Categories</h3>
        <ul>
            @foreach($family->categories as $category)
                <li>
                    <a href="{{ route('categories.show', $category) }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</x-show>
