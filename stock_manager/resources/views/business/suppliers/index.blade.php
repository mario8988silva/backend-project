@php
$columns = [
    ['name', 'Name'],
    ['phone', 'Phone'],
    ['email', 'Email'],
    ['categories_count', 'Categories'],
    ['representatives_count', 'Reps'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];

$filtersLabels = ['Name', 'Email'];

$filters = [
    view('components.filter-text', ['name' => 'name', 'label' => 'Name'])->render(),
    view('components.filter-text', ['name' => 'email', 'label' => 'Email'])->render(),
];
@endphp

<x-index 
    title="Suppliers List"
    :columns="$columns"
    :filtersLabels="$filtersLabels"
    :filters="$filters"
    :items="$suppliers"
/>

{{ $suppliers->links() }}
