<x-layout>

    <h2 class="text-2xl font-semibold tracking-tight mb-6">
        Create Order
    </h2>

    <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
        @csrf

        <button type="submit" class="btn-primary">
            Create Order
        </button>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-x-auto">
            <table class="min-w-full text-sm table-striped">
                <thead class="bg-gray-50 text-gray-600 border-b">
                    <tr>
                        <th class="px-4 py-2 font-medium text-left">Stock</th>
                        <th class="px-4 py-2 font-medium text-left">Actions</th>
                        <th class="px-4 py-2 font-medium text-left">Ordered</th>
                        <th class="px-4 py-2 font-medium text-left">Product</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach($products as $product)
                    <tr>

                        {{-- STOCK --}}
                        <td class="px-4 py-2 whitespace-nowrap">
                            {{ $product->stocks->sum('quantity') }}
                        </td>

                        {{-- ACTIONS --}}
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="flex items-center gap-2">

                                {{-- -1 --}}
                                <button type="button" class="btn-secondary px-3" onclick="decrement({{ $product->id }})">–</button>

                                {{-- +1 --}}
                                <button type="button" class="btn-secondary px-3" onclick="increment({{ $product->id }})">+</button>

                                {{-- Set --}}
                                <button type="button" class="btn-secondary px-3" onclick="document.getElementById('dialog-{{ $product->id }}').showModal()">
                                    Set
                                </button>

                            </div>

                            {{-- Hidden input --}}
                            <input type="hidden" name="products[{{ $product->id }}]" id="input-{{ $product->id }}" value="0">

                            {{-- Dialog --}}
                            <dialog id="dialog-{{ $product->id }}" class="modal p-0 rounded-lg shadow-lg">
                                <form method="dialog" class="card max-w-sm">
                                    <h3 class="mb-3">Set Quantity</h3>

                                    <input type="number" min="0" id="dialog-input-{{ $product->id }}" class="input mb-4">

                                    <div class="flex justify-end gap-3">
                                        <button type="button" class="btn-secondary" onclick="document.getElementById('dialog-{{ $product->id }}').close()">
                                            Cancel
                                        </button>

                                        <button type="button" class="btn-primary" onclick="applyDialog({{ $product->id }})">
                                            Apply
                                        </button>
                                    </div>
                                </form>
                            </dialog>
                        </td>

                        {{-- ORDERED --}}
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span id="ordered-{{ $product->id }}">0</span>
                        </td>

                        {{-- PRODUCT --}}
                        <td class="px-4 py-2 whitespace-nowrap">
                            {{ $product->name }}
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </form>

    <script>
        function increment(id) {
            const input = document.getElementById(`input-${id}`);
            const ordered = document.getElementById(`ordered-${id}`);
            let value = parseInt(input.value || 0);
            value++;
            input.value = value;
            ordered.textContent = value;
        }

        function decrement(id) {
            const input = document.getElementById(`input-${id}`);
            const ordered = document.getElementById(`ordered-${id}`);
            let value = parseInt(input.value || 0);
            value = Math.max(0, value - 1);
            input.value = value;
            ordered.textContent = value;
        }

        function applyDialog(id) {
            const dialog = document.getElementById(`dialog-${id}`);
            const dialogInput = document.getElementById(`dialog-input-${id}`);
            const input = document.getElementById(`input-${id}`);
            const ordered = document.getElementById(`ordered-${id}`);
            const value = parseInt(dialogInput.value || 0);
            input.value = value;
            ordered.textContent = value;
            dialog.close();
        }

    </script>
</x-layout>
