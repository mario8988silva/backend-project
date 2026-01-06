@php
$columns = [
['name', 'Name'],
['email', 'Email'],
['role.name', 'Role'],
['created_at', 'Created'],
['updated_at', 'Updated'],
];

$filtersLabels = [
'Name',
'Email',
'Role',
];

$filters = [
view('components.filter-text', [
'name' => 'name',
'label' => 'Name',
])->render(),

view('components.filter-text', [
'name' => 'email',
'label' => 'Email',
])->render(),

view('components.filter-select', [
'name' => 'role_id',
'options' => $roles->map(fn($r) => ['id' => $r->id, 'name' => $r->value]),
'valueField' => 'id',
'textField' => 'name',
'placeholder' => '-- Role --',
])->render(),

];

@endphp

<x-index title="Team's List" :columns="$columns" :filtersLabels="$filtersLabels" :filters="$filters" :items="$users" />

{{ $users->links() }}
