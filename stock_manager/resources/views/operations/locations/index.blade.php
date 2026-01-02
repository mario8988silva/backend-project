@php
$columns = [
    ['name', 'Name'],
    ['address', 'Address'],
    ['type', 'Type'],
    ['stocks_count', 'Stock Count'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];

$filtersLabels = ['Name', 'Address', 'Type'];

$filters = [
    view('components.filter-text', ['name' => 'name', 'label' => 'Name'])->render(),
    view('components.filter-text', ['name' => 'address', 'label' => 'Address'])->render(),
    view('components.filter-text', ['name' => 'type', 'label' => 'Type'])->render(),
];
@endphp

<x-index 
    title="Locations List"
    :columns="$columns"
    :filtersLabels="$filtersLabels"
    :filters="$filters"
    :items="$locations"
/>

{{ $locations->links() }}
