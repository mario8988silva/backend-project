<x-layout>
    <h2>Products List</h2>
    <ul>
        @foreach($products as $product)
        <li>
            <x-card href="/products/{{ $product->id }}">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description ?? 'No description' }}</p>

            </x-card>
        </li>
        @endforeach
    </ul>
</x-layout>
