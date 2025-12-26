<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/src/style.css" rel="stylesheet">
    {{--
    @vite(['resources/css/app.css','resources/js/app.js'])
    --}}
    <title>Stock Manager</title>
</head>

<body>
    {{-- Header/Nav/User --}}
    <header>
        <h1>Stock Manager</h1>
        <hr>

        @guest
        <ul>
            <li><a href="{{ route('login') }}"><button>Login</button></a></li>
            <li><a href="{{ route('register') }}"><button>Register</button></a></li>
        </ul>
        <hr>
        @endguest

        @auth

        <nav>
            <x-user-info />
            <x-nav-menu />
        </nav>
    </header>

    <main class="container">
        <x-options />

        @endauth

        {{ $slot }}
    </main>



</body>
</html>
