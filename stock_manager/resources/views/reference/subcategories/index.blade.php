@php
$columns = [
    ['name', 'Name'],
    ['category.name', 'Category'],
    ['category.family.name', 'Family'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];

$filtersLabels = ['Name'];

$filters = [
    view('components.filter-text', ['name' => 'name', 'label' => 'Name'])->render(),
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
