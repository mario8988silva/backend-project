@php
$menu = [
    ['overview.index', 'Make an Order'],
    ['stocks.index', 'Stock'],
    ['suppliers.index', 'Suppliers'],
    ['orders.index', 'Orders'],
    ['products.index', 'Products'],
    ['users.index', 'Team'],
    ['waste-logs.index', 'Waste Log'],
];
@endphp

<ul class="nav-menu">
    @foreach ($menu as [$route, $label])
        <li><a href="{{ route($route) }}">{{ $label }}</a></li>
    @endforeach
</ul>

<hr>
