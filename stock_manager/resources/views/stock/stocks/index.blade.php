@php
$columns = [
    ['quantity', 'Qty'],
    ['product.name', 'Product'],
    ['orderHasProduct.order_id', 'Order'],
    ['status.name', 'Status'],
    ['location.name', 'Location'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];

$filtersLabels = [
    'Product',
    'Status',
    'Location',
];

$filters = [
    view('components.filter-select', [
        'name' => 'product_id',
        'options' => $products,
        'selected' => request('product_id'),
    ])->render(),

    view('components.filter-select', [
        'name' => 'status_id',
        'options' => $statuses,
        'selected' => request('status_id'),
    ])->render(),

    view('components.filter-select', [
        'name' => 'location_id',
        'options' => $locations,
        'selected' => request('location_id'),
    ])->render(),
];
@endphp

<x-index 
    title="Stock List"
    :columns="$columns"
    :filtersLabels="$filtersLabels"
    :filters="$filters"
    :items="$stocks"
/>
