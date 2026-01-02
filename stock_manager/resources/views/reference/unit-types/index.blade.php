@php
$columns = [
    ['name', 'Name'],
    ['symbol', 'Symbol'],
    ['description', 'Description'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];

$filtersLabels = ['Name', 'Symbol', 'Description'];

$filters = [
    view('components.filter-text', ['name' => 'name', 'label' => 'Name'])->render(),
    view('components.filter-text', ['name' => 'symbol', 'label' => 'Symbol'])->render(),
    view('components.filter-text', ['name' => 'description', 'label' => 'Description'])->render(),
];
@endphp

<x-index 
    title="Unit-Types List"
    :columns="$columns"
    :filtersLabels="$filtersLabels"
    :filters="$filters"
    :items="$unit_types"
/>

{{ $unit_types->links() }}
