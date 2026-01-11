@php
$columns = [
['name', 'Name'],
['phone', 'Phone'],
['email', 'Email'],
['supplier.name', 'Supplier'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];

$filtersLabels = ['Supplier', 'Search',];

$filters = [
view('components.filter-select', ['name' => 'supplier_id', 'label' => 'Supplier', 'options' => $suppliers])->render(),

view('components.filter-text', ['name' => 'search', 'label' => 'Search'])->render(),
];
@endphp

<x-index title="Representatives List" :columns="$columns" :filtersLabels="$filtersLabels" :filters="$filters" :items="$representatives" />

{{ $representatives->links() }}
