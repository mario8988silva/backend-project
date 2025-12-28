<x-layout>
    <a href="{{ route('products.index') }}">go back index</a>

    <h2>{{ $product->name }}</h2>

    @if(!empty($product->image))
    <img src="{{ $product->image }}" alt="Product image" width="200">
    @else
    <span>No image available</span>
    @endif

    <br>
    <tr>
        <td>
            <a href="{{ route('products.edit', $product->id) }}">
                <button type="button">Edit</button>
            </a>
        </td>

        <button type="button" onclick="document.getElementById('deleteModal').showModal()">
            Delete
        </button>

    </tr>

    <ul>
        <li>id: {{ $product->id}}</li>
        <li>barcode: {{ $product->barcode ?? 'x' }}</li>
        <li>name: {{ $product->name }}</li>

        <li>unit_type: {{ $product->unit_type->name ?? 'x' }}</li>
        <li>iva_category: {{ $product->iva_category->rate ?? 'x' }}%</li>

        <li>brand: {{ $product->brand->name ?? 'x' }}</li>
        <li>subcategory: {{ $product->subcategory->name ?? 'x' }}</li>
        <li>category: {{ $product->subcategory->category->name ?? 'x' }}</li>
        <li>family: {{ $product->subcategory->category->family->name ?? 'x' }}</li>

        <li>nutri_score: {{ $product->nutri_score_id ?? '' }}</li>
        <li>eco_score: {{ $product->eco_score_id ?? '' }}</li>

        <li>sugar_free: {{ $product->sugar_free ?? '' }}</li>
        <li>gluten_free: {{ $product->gluten_free ?? '' }}</li>
        <li>lactose_free: {{ $product->lactose_free ?? '' }}</li>
        <li>vegan: {{ $product->vegan ?? '' }}</li>
        <li>vegetarian: {{ $product->vegetarian ?? '' }}</li>
        <li>organic: {{ $product->organic ?? '' }}</li>
    </ul>
</x-layout>

<dialog id="deleteModal" class="modal">
    <form method="POST" action="{{ route('products.destroy', $product) }}">
        @csrf
        @method('DELETE')

        <h3>Remove Product</h3>

        <p>How many units are being removed?</p>

        <input type="number" name="quantity" min="1" value="1" required>

        <p>Status:</p>
        <select name="status_id" required>
            <option value="">-- Select Status --</option>
            @foreach($statuses as $status)
            <option value="{{ $status->id }}">
                {{ $status->state }}
            </option>
            @endforeach
        </select>

        <div style="margin-top: 1rem;">
            <button type="submit">Confirm Removal</button>
            <button type="button" onclick="document.getElementById('deleteModal').close()">Cancel</button>
        </div>
    </form>
</dialog>
