@php
$columns = [
['name', 'Name'],
['country', 'Country'],
['description', 'Description'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];

$filtersLabels = ['Search'];

$filters = [
view('components.filter-text', [
'name' => 'search',
'label' => 'search'
])->render(),
];
@endphp

<x-index title="Brands List" :columns="$columns" :filtersLabels="$filtersLabels" :filters="$filters" :items="$brands" />

{{ $brands->links() }}
