@php
$columns = [
    ['name', 'Name'],
    ['rate', 'Rate'],
    ['description', 'Description'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];

$filtersLabels = ['Name', 'Rate', 'Description'];

$filters = [
    view('components.filter-text', ['name' => 'name', 'label' => 'Name'])->render(),
    view('components.filter-text', ['name' => 'rate', 'label' => 'Rate'])->render(),
    view('components.filter-text', ['name' => 'description', 'label' => 'Description'])->render(),
];
@endphp

<x-index 
    title="IVA Categories List"
    :columns="$columns"
    :filtersLabels="$filtersLabels"
    :filters="$filters"
    :items="$iva_categories"
/>

{{ $iva_categories->links() }}
