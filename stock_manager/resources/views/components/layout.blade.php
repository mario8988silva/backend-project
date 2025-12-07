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
                <li><a href="/products">All Products</a></li>
                <li><a href="/products/create">Create</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        {{ $slot }}
    </main>

</body>
</html>
