@php
$columns = [
['name', 'Name'],
['email', 'Email'],
['role.name', 'Role'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];

$filtersLabels = [
'Role',
'Search',
];

$filters = [
view('components.filter-select', ['name' => 'role_id', 'label' => 'Role', 'options' => $roles])->render(),

view('components.filter-text', ['name' => 'search', 'label' => 'Search'])->render(),
];

@endphp

<x-index title="Team's List" :columns="$columns" :filtersLabels="$filtersLabels" :filters="$filters" :items="$users" />

{{ $users->links() }}
