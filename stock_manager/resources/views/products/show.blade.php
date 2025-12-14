<x-layout>
    <h2>{{ $product->name }}</h2>

    @if(!empty($product->image))
        <img src="{{ $product->image }}" alt="Product image" width="200">
    @else
        <span>No image available</span>
    @endif

    <br>
    <tr>
        <td onclick="window.location='{{ route('products.edit', $product->id) }}'"><button type="submit">Edit</button></td>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <td>
            <button type="submit">Delete</button>
            </td>
        </form>
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
