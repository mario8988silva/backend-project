@php
$columns = [
    ['name', 'Name'],
    ['description', 'Description'],
    ['categories_count', 'Categories'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];

$filtersLabels = ['Name'];

$filters = [
    view('components.filter-text', ['name' => 'name', 'label' => 'Name'])->render(),
];
@endphp

<x-index 
    title="Families List"
    :columns="$columns"
    :filtersLabels="$filtersLabels"
    :filters="$filters"
    :items="$families"
/>

{{ $families->links() }}
