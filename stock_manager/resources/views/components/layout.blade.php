<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/src/style.css" rel="stylesheet">

    <title>Layout</title>
</head>
<body>
    <header>
        <h1>Stock Manager - Products</h1>
        <nav>

            @guest
            <ul>
                <li><a href="{{ route('show.login') }}"><button>Login</button></a></li>
                <li><a href="{{ route('show.register') }}"><button>Register</button></a></li>
            </ul>
            @endguest

            @auth
            <ul>
                <li>
                    <form action="{{ route('logout')}} " method="post">
                        @csrf
                        <button>Logout</button>
                    </form>
                </li>
                <li>{{ Auth::user()->name }}</li>
            </ul>

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
                <li><a href="{{ route('products.create') }}">Add New...</a></li>
            </ul>
        </nav>
        @endauth
    </header>

    <main class="container">
        {{ $slot }}
    </main>

</body>
</html>
