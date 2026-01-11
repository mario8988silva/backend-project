<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css','resources/js/app.js'])

    <title>Stock Manager</title>
</head>

<body class="min-h-screen flex flex-col">

    {{-- HEADER --}}
    <header class="bg-white shadow-sm px-4 sm:px-6 py-6">

        {{-- Top row: Title + User Info --}}
        <div class="flex flex-wrap items-center justify-between gap-6 mb-6">

            {{-- Title --}}
            <a href="{{ route('home') }}">
                <h1 class="text-xl font-semibold whitespace-nowrap">
                    Stock Manager
                </h1>
            </a>

            {{-- User Info OR Login/Register --}}
            @auth
            <div class="flex flex-wrap gap-4 text-sm mt-2">
                <x-user-info />
            </div>
            @endauth

            @guest
            <div class="flex gap-3 flex-shrink-0">
                <a href="{{ route('login') }}" class="btn-secondary">Login</a>
                <a href="{{ route('register') }}" class="btn-primary">Register</a>
            </div>
            @endguest
        </div>

        {{-- NAV MENU (wraps cleanly on small screens) --}}
        @auth
        <nav class="flex flex-wrap gap-6 text-sm mt-4">
            <x-nav-menu />
        </nav>
        @endauth

    </header>

    {{-- MAIN CONTENT --}}
    <main class="flex flex-wrap gap-6 text-sm mt-6">
        @auth
        <x-options />
        @endauth

        <div class="w-full">
            {{ $slot }}
        </div>
    </main>

</body>
</html>
