@php
$columns = [
    ['name', 'Name'],
    ['category.name', 'Category'],
    ['category.family.name', 'Family'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];

$filtersLabels = ['Category', 'Family', 'Search'];

$filters = [
    view('components.filter-select', [
        'name' => 'category_id',
        'label' => 'Category',
        'options' => $categories,
        'valueField' => 'id',
        'textField' => 'name',
    ])->render(),

    view('components.filter-select', [
        'name' => 'family_id',
        'label' => 'Family',
        'options' => $families,
        'valueField' => 'id',
        'textField' => 'name',
    ])->render(),

    view('components.filter-text', [
        'name' => 'search',
        'label' => 'Search'
    ])->render(),
];


@endphp

<x-index 
    title="Subcategories List"
    :columns="$columns"
    :filtersLabels="$filtersLabels"
    :filters="$filters"
    :items="$subcategories"
/>

{{ $subcategories->links() }}
