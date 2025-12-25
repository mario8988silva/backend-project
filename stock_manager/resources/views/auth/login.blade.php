<x-layout>
    <form action="{{ route('login')}}" method="POST">
        @csrf

        <h2>Log In</h2>

        <label for="email">Email:</label>
        <input type="email" name="email" required value="{{ old('email') }}">

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>

        <!-- Error Display -->
        @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li class="my-2 text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </form>

</x-layout>
