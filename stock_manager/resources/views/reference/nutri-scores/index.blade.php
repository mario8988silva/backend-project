@php
$columns = [
    ['name', 'Name'],
    ['label', 'Label'],
    ['description', 'Description'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];

$filtersLabels = ['Name', 'Label', 'Description'];

$filters = [
    view('components.filter-text', ['name' => 'name', 'label' => 'Name'])->render(),
    view('components.filter-text', ['name' => 'label', 'label' => 'Label'])->render(),
    view('components.filter-text', ['name' => 'description', 'label' => 'Description'])->render(),
];
@endphp

<x-index 
    title="Nutri Scores List"
    :columns="$columns"
    :filtersLabels="$filtersLabels"
    :filters="$filters"
    :items="$nutri_scores"
/>

{{ $nutri_scores->links() }}
