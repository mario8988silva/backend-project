@php
$columns = [
    ['product.name', 'Product'],
    ['order.id', 'Order'],
    ['quantity', 'Qty'],
    //['price', 'Price'],
    //['total', 'Total'],
    ['sold_at', 'Sold At'],
    ['location', 'Location'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];
@endphp

<x-index 
    title="Sold Products List"
    :columns="$columns"
    :items="$sold_products"
/>

