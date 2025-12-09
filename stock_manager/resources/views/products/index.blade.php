<x-layout>
    <h2>Products List</h2>

    <ul>
        @foreach($products as $product)
        <li>
            <x-card href="{{ route('products.show', $product->id)}}">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description ?? 'No description' }}</p>

            </x-card>
        </li>
        @endforeach
    </ul>
    {{ $products->links()}}
</x-layout>
