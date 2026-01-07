@php
$columns = [
['name', 'Name'],
['description', 'Description'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];

$filtersLabels = ['Search'];

$filters = [
view('components.filter-text', ['name' => 'search', 'label' => 'Search'])
];

@endphp

<x-index title="Families List" :columns="$columns" :filtersLabels="$filtersLabels" :filters="$filters" :items="$families" />

{{ $families->links() }}
