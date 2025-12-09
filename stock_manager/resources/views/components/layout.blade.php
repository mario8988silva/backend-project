<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
</head>
<body>
    <header>
        <h1>Stock Manager - Products</h1>
        <nav>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Stock</a></li>
                <li><a href="">Retailers</a></li>
                <li><a href="">Orders</a></li>
                <li><a href="/products">Products</a></li>
                <li><a href="">Team</a></li>
                <li><a href="">Waste Log</a></li>
            </ul>
            <ul>
                <li><a href="{{ route('products.index') }}">All Products</a></li>
                <li><a href="{{ route('products.create') }}">Create</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        layout
        {{ $slot }}
    </main>

</body>
</html>
