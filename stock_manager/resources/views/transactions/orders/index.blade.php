@php
$columns = [
['representative.name', 'Representative'],
['status.state', 'Status'],
['user.name', 'User'],
['order_date', 'Order Date'],
['delivery_date', 'Delivery Date'],
//['invoice.number', 'Invoice'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];

$filtersLabels = [
'Status',
'Representative',
'User',
'Order Date',
'Delivery Date',
'Search',
];

$filters = [

view('components.filter-select', ['name' => 'statuses_id', 'label' => 'Status', 'options' => $statuses])->render(),

view('components.filter-select', ['name' => 'representative_id', 'label' => 'Representative', 'options' => $representatives])->render(),

view('components.filter-select', ['name' => 'user_id', 'label' => 'User', 'options' => $users])->render(),

view('components.filter-text', ['name' => 'search', 'label' => 'Search'])->render(),
];

@endphp

<x-index title="Orders List" :columns="$columns" :filtersLabels="$filtersLabels" :filters="$filters" :items="$orders" />
