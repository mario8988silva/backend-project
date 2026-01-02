@php
$columns = [
    ['name', 'Name'],
    ['country', 'Country'],
    ['description', 'Description'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];

$filtersLabels = ['Name', 'Country'];

$filters = [
    view('components.filter-text', ['name' => 'name', 'label' => 'Name'])->render(),
    view('components.filter-text', ['name' => 'country', 'label' => 'Country'])->render(),
];
@endphp

<x-index 
    title="Brands List"
    :columns="$columns"
    :filtersLabels="$filtersLabels"
    :filters="$filters"
    :items="$brands"
/>

{{ $brands->links() }}
