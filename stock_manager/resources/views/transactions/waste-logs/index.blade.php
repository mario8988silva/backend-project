{{--
@php
$columns = [
['product.name', 'Product'],
['order.id', 'Order'],
['status.state', 'Status'],
['quantity', 'Qty'],
['logged_at', 'Logged At'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];

$filtersLabels = [
'Product',
'Order',
'Status',
'Logged From',
];

$filters = [
// PRODUCT
view('components.filter-select', [
'name' => 'product_id',
'options' => $products->map(fn($p) => ['id' => $p->id, 'name' => $p->name]),
'valueField' => 'id',
'textField' => 'name',
'placeholder' => '-- Product --',
])->render(),

// ORDER
view('components.filter-select', [
'name' => 'order_id',
'options' => $orders->map(fn($o) => ['id' => $o->id, 'name' => 'Order #' . $o->id]),
'valueField' => 'id',
'textField' => 'name',
'placeholder' => '-- Order --',
])->render(),

// STATUS
view('components.filter-select', [
'name' => 'status_id',
'options' => $statuses->map(fn($s) => ['id' => $s->id, 'name' => $s->state]),
'valueField' => 'id',
'textField' => 'name',
'placeholder' => '-- Status --',
])->render(),

// LOGGED FROM (DATE)
view('components.filter-date', [
'name' => 'logged_from',
'label' => 'Logged From',
])->render(),
];
@endphp

<x-index title="Waste Logs List" :columns="$columns" :filtersLabels="$filtersLabels" :filters="$filters" :items="$waste_logs" />

{{ $waste_logs->links() }}
--}}