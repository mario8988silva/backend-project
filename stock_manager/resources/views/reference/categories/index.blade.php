@php
$columns = [
    ['name', 'Name'],
    ['family.name', 'Family'],
    ['description', 'Description'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];

$filtersLabels = ['Name', 'Family'];

$filters = [
    view('components.filter-text', ['name' => 'name', 'label' => 'Name'])->render(),

    view('components.filter-select', [
        'name' => 'family_id',
        'options' => $families,
        'label' => 'Family'
    ])->render(),
];
@endphp

<x-index 
    title="Categories List"
    :columns="$columns"
    :filtersLabels="$filtersLabels"
    :filters="$filters"
    :items="$categories"
/>

{{ $categories->links() }}
