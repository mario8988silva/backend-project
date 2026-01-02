@php
$columns = [
    ['name', 'Name'],
    ['phone', 'Phone'],
    ['email', 'Email'],
    ['supplier.name', 'Supplier'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];

$filtersLabels = ['Name', 'Phone', 'Email'];

$filters = [
    view('components.filter-text', ['name' => 'name', 'label' => 'Name'])->render(),
    view('components.filter-text', ['name' => 'phone', 'label' => 'Phone'])->render(),
    view('components.filter-text', ['name' => 'email', 'label' => 'Email'])->render(),
];
@endphp

<x-index 
    title="Representatives List"
    :columns="$columns"
    :filtersLabels="$filtersLabels"
    :filters="$filters"
    :items="$representatives"
/>

{{ $representatives->links() }}
