@props([
'action',
'label' => 'Delete',
'message' => 'Are you sure you want to delete this?',
'id' => 'deleteDialog-' . uniqid(),
])

{{-- Trigger --}}
<button type="button" class="text-gray-600 hover:text-red-600 transition" onclick="document.getElementById('{{ $id }}').showModal()">
    {{ $label }}
</button>

{{-- Dialog --}}
<dialog id="{{ $id }}" class="modal rounded-lg shadow-lg">

    <form method="POST" action="{{ $action }}" class="card max-w-md">
        @csrf
        @method('DELETE')

        <h3 class="mb-3">Confirm Deletion</h3>

        <p class="mb-4">{{ $message }}</p>

        <div class="flex justify-end gap-3 mt-4">
            <button type="button" class="btn-secondary" onclick="document.getElementById('{{ $id }}').close()">
                Cancel
            </button>

            <button type="submit" class="btn-danger-soft">
                Confirm
            </button>
        </div>
    </form>

</dialog>
