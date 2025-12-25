@php
$columns = [
    ['name', 'Name'],
    ['email', 'Email'],
    ['role', 'Role'],
    ['created_at', 'Created'],
    ['updated_at', 'Updated'],
];
@endphp

<x-index :title="'Users List'" :columns="$columns">

    <x-slot name="filters">
        <td><input type="text" name="name" placeholder="Name" value="{{ request('name') }}"></td>
        <td><input type="text" name="email" placeholder="Email" value="{{ request('email') }}"></td>

        <td>
            <select name="role">
                <option value="">-- Role --</option>
                <option value="admin" {{ request('role')=='admin' ? 'selected' : '' }}>Admin</option>
                <option value="manager" {{ request('role')=='manager' ? 'selected' : '' }}>Manager</option>
                <option value="staff" {{ request('role')=='staff' ? 'selected' : '' }}>Staff</option>
            </select>
        </td>

        <td></td>
        <td></td>
    </x-slot>

    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->created_at->format('Y-m-d') }}</td>
            <td>{{ $user->updated_at->format('Y-m-d') }}</td>

            <td>
                <a href="{{ route('users.edit', $user) }}">Edit</a>
            </td>

            <td>
                <form method="POST" action="{{ route('users.destroy', $user) }}">
                    @csrf @method('DELETE')
                    <button>Delete</button>
                </form>
            </td>

            <td>
                <a href="{{ route('users.show', $user) }}">See</a>
            </td>
        </tr>
    @endforeach

</x-index>
