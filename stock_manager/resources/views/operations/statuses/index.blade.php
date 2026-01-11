@php
$columns = [
    ['state', 'State'],
    ['description', 'Description'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];
/*
$filtersLabels = ['Name', 'Address', 'Type'];

$filters = [
    view('components.filter-text', ['name' => 'name', 'label' => 'Name'])->render(),
    view('components.filter-text', ['name' => 'address', 'label' => 'Address'])->render(),
    view('components.filter-text', ['name' => 'type', 'label' => 'Type'])->render(),
];
*/
@endphp

<x-index 
    title="Status List"
    :columns="$columns"
    {{--
    :filtersLabels="$filtersLabels"
    :filters="$filters"
    --}}
    :items="$statuses"
/>

{{ $statuses->links() }}
