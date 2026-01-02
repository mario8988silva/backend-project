<x-layout>

    <div class="max-w-md mx-auto card">
        <h2>Log In</h2>

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf

            <div class="flex flex-col gap-1">
                <label for="email" class="font-medium">Email</label>
                <input type="email" name="email" required value="{{ old('email') }}" class="input">
            </div>

            <div class="flex flex-col gap-1">
                <label for="password" class="font-medium">Password</label>
                <input type="password" name="password" required class="input">
            </div>

            <button type="submit" class="btn-primary w-full">
                Login
            </button>

            @if ($errors->any())
                <ul class="mt-4 space-y-1">
                    @foreach($errors->all() as $error)
                        <li class="text-red-500 text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form>
    </div>

</x-layout>
