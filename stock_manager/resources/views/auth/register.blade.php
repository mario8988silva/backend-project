<x-layout>

    <div class="max-w-md mx-auto card">
        <h2>Register</h2>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <div class="flex flex-col gap-1">
                <label for="name" class="font-medium">Name</label>
                <input type="text" name="name" required value="{{ old('name') }}" class="input">
            </div>

            <div class="flex flex-col gap-1">
                <label for="email" class="font-medium">Email</label>
                <input type="email" name="email" required value="{{ old('email') }}" class="input">
            </div>

            <div class="flex flex-col gap-1">
                <label for="password" class="font-medium">Password</label>
                <input type="password" name="password" required class="input">
            </div>

            <div class="flex flex-col gap-1">
                <label for="password_confirmation" class="font-medium">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="input">
            </div>

            <button type="submit" class="btn-primary w-full">
                Register
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
