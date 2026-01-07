@php
$columns = [
    ['name', 'Name'],
    ['symbol', 'Symbol'],
    ['description', 'Description'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];

$filtersLabels = ['Search'];

$filters = [
    view('components.filter-text', ['name' => 'search', 'label' => 'Search'])->render(),
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
