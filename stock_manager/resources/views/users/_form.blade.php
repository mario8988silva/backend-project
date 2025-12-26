<x-layout>
    <x-form :title="isset($user) ? 'Edit User' : 'Create New User'" :action="isset($user) ? route('users.update', $user) : route('users.store')" :method="isset($user) ? 'PUT' : 'POST'" :cancel="isset($user) ? route('users.show', $user) : route('users.index')" :submit="isset($user) ? 'Update User' : 'Create User'">

        {{-- NAME --}}
        <div>
            <label for="name">Name*:</label>
            <input type="text" id="name" name="name" required value="{{ old('name', $user->name ?? '') }}" class="{{ $errors->has('name') ? 'input-error' : '' }}">
        </div>

        {{-- EMAIL --}}
        <div>
            <label for="email">Email*:</label>
            <input type="email" id="email" name="email" required value="{{ old('email', $user->email ?? '') }}" class="{{ $errors->has('email') ? 'input-error' : '' }}">
        </div>

        {{-- PHONE --}}
        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone ?? '') }}" class="{{ $errors->has('phone') ? 'input-error' : '' }}">
        </div>

        {{-- PASSWORD --}}
        <div>
            <label for="password">
                Password{{ isset($user) ? ' (leave blank to keep current)' : '*' }}:
            </label>

            <input type="password" id="password" name="password" class="{{ $errors->has('password') ? 'input-error' : '' }}" {{ isset($user) ? '' : 'required' }}>
        </div>

    </x-form>
</x-layout>
