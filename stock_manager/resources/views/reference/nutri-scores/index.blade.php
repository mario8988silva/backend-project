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

<x-index title="Nutri Scores List" :columns="$columns" :filtersLabels="$filtersLabels" :filters="$filters" :items="$nutri_scores" />

{{ $nutri_scores->links() }}
