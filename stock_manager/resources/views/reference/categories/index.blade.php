@php
$columns = [
['name', 'Name'],
['family.name', 'Family'],
['description', 'Description'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];

$filtersLabels = ['Family', 'Search'];

$filters = [
view('components.filter-select', [
'name' => 'family_id',
'label' => 'Family',
'options' => $families,
'valueField' => 'id',
'textField' => 'name',
])->render(),

view('components.filter-text', [
'name' => 'search',
'label' => 'Search'
])->render(),
];
@endphp

<x-index title="Categories List" :columns="$columns" :filtersLabels="$filtersLabels" :filters="$filters" :items="$categories" />

{{ $categories->links() }}
