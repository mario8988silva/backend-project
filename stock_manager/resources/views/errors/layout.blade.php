<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css','resources/js/app.js'])

    <title>Stock Manager</title>
</head>

<body class="min-h-screen flex flex-col">

    <div class="min-h-[60vh] flex flex-col items-center justify-center text-center px-6">
        <h1 class="text-6xl font-bold text-gray-800 mb-4">
            @yield('code')
        </h1>

        <h2 class="text-2xl font-semibold text-gray-700 mb-6">
            @yield('title')
        </h2>

        <p class="text-gray-600 max-w-xl mb-8">
            @yield('message')
        </p>

        <a href="{{ url()->previous() }}" class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition">
            Go Back
        </a>

        <a href="{{ url('/') }}" class="mt-3 text-gray-500 underline hover:text-gray-700">
            Return Home
        </a>

    </div>
</body>
</html>
