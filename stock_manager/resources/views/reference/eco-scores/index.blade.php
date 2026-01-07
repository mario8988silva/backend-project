@php
$columns = [
['name', 'Name'],
['label', 'Label'],
['description', 'Description'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];

$filtersLabels = ['Search'];

$filters = [
view('components.filter-text', ['name' => 'search', 'label' => 'Search'])->render(),
];
@endphp

<x-index title="Eco Scores List" :columns="$columns" :filtersLabels="$filtersLabels" :filters="$filters" :items="$eco_scores" />

{{ $eco_scores->links() }}
