<x-show :title="$user->name" :editRoute="route('users.edit', $user)" :deleteRoute="route('users.destroy', $user)" :indexRoute="route('users.index')" :fields="[
        'ID' => $user->id,
        'Name' => $user->name,
        'Email' => $user->email,
        'Phone' => $user->phone ?? '—',
        'Role' => $user->role->value ?? '—',
        'Email Verified' => $user->email_verified_at
            ? $user->email_verified_at->format('Y-m-d H:i')
            : 'Not verified',
        'Created At' => $user->created_at->format('Y-m-d H:i'),
        'Updated At' => $user->updated_at->format('Y-m-d H:i'),
    ]">
    @if($user->permissions()->count())
    <h3>Permissions</h3>
    <ul>
        @foreach($user->permissions() as $permission)
        <li>{{ $permission->name }}</li>
        @endforeach
    </ul>
    @endif
</x-show>
