@php
$menu = [
['stocks.index', 'Stock'],
['products.index', 'Products'],
['orders.index', 'Orders'],
['suppliers.index', 'Suppliers'],
['users.index', 'Team'],
// lixeira/soft-delete deposit,
];
@endphp

<ul class="flex flex-wrap gap-4 items-center">
    @foreach ($menu as [$route, $label])
    <li><a href="{{ route($route) }}">{{ $label }}</a></li>
    @endforeach
</ul>
