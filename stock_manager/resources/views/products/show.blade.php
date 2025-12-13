<x-layout>
    <h2>{{ $product->name }}</h2>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Product</button>    
    </form>
    
    <ul>
        <li>
            {{ $product->id ?? 'N/A' }} -
            {{ $product->barcode ?? 'N/A' }} -
            {{ $product->name }} -
            {{ $product->description ?? 'No description' }}
        </li>
    </ul>
</x-layout>
