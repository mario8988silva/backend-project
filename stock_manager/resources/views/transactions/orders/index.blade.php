@php
$columns = [
    ['representative.name', 'Representative'],
    ['user.name', 'User'],
    ['order_date', 'Order Date'],
    ['delivery_date', 'Delivery Date'],
    ['status.state', 'Status'],
    ['invoice.number', 'Invoice'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];
@endphp

<x-index 
    title="Orders List"
    :columns="$columns"
    :filtersLabels="$filtersLabels"
    :filters="$filters"
    :items="$orders"
/>
