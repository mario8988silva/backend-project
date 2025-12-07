<x-layout>
    <h2>{{ $product->name }}</h2>
    <ul>
        <li>
            {{ $product->id ?? 'N/A' }} -
            {{ $product->barcode ?? 'N/A' }} -
            {{ $product->name }} -
            {{ $product->description ?? 'No description' }}
        </li>
    </ul>
</x-layout>
