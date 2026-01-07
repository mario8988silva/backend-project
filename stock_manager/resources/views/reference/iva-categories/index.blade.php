@php
$columns = [
['name', 'Name'],
['rate', 'Rate'],
['description', 'Description'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];

$filtersLabels = ['Search'];

$filters = [
view('components.filter-text', ['name' => 'search', 'label' => 'Search'])->render(),
];
@endphp

<x-index title="IVA Categories List" :columns="$columns" :filtersLabels="$filtersLabels" :filters="$filters" :items="$iva_categories" />

{{ $iva_categories->links() }}
