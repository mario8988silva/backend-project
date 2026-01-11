@php
$columns = [
['quantity', 'Qty'],
['order.id', 'Order'],
['stock.id', 'Stock Entry'],
['moved_at', 'Moved At'],
['created_at', 'Created'],
['updated_at', 'Updated'],
['product.name', 'Product'],
['movement_type', 'Type'],


];

$filtersLabels = [
'Product',
'Type',
'Order',
'Moved From',
];
/*
$filters = [
// Product filter
view('components.filter-select', [
'name' => 'product_id',
'options' => $products,
'selected' => request('product_id'),
])->render(),

// Movement type filter
view('components.filter-select', [
'name' => 'movement_type',
'options' => collect([
(object)['id' => 'IN', 'name' => 'IN'],
(object)['id' => 'OUT', 'name' => 'OUT'],
(object)['id' => 'ADJUST', 'name' => 'ADJUST'],
]),
'selected' => request('movement_type'),
])->render(),

// Order filter
view('components.filter-select', [
'name' => 'order_id',
'options' => $orders->map(fn($o) => (object)[
'id' => $o->id,
'name' => 'Order #' . $o->id
]),
'selected' => request('order_id'),
])->render(),

// Moved From (date)
view('components.filter-date', [
'name' => 'moved_from',
'label' => 'Moved From',
])->render(),
];*/
@endphp

<x-index 
title="Stock Movements List" 
:columns="$columns" 
:filtersLabels="$filtersLabels" 
{{--:filters="$filters"--}} 
:items="$stockMovements" />
