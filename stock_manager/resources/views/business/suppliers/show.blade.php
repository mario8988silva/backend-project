<x-show :title="$supplier->name" :editRoute="route('suppliers.edit', $supplier)" :deleteRoute="route('suppliers.destroy', $supplier)" :fields="[
        'ID' => $supplier->id,
        'Name' => $supplier->name,
        'Phone' => $supplier->phone ?? '—',
        'Email' => $supplier->email ?? '—',
        'Address' => $supplier->address ?? '—',
        'Notes' => $supplier->notes ?? '—',
        'Representatives Count' => $supplier->representatives->count(),
        'Categories Count' => $supplier->categories->count(),
        'Products Count' => $supplier->products->count(),
        'Invoices Count' => $supplier->invoices->count(),
        'Created At' => $supplier->created_at->format('Y-m-d H:i'),
        'Updated At' => $supplier->updated_at->format('Y-m-d H:i'),
    ]">
    {{-- OPTIONAL EXTRA SECTION: Representatives --}}
    @if($supplier->representatives->count())
    <h3>Representatives</h3>
    <ul>
        @foreach($supplier->representatives as $rep)
        <li>
            <a href="{{ route('representatives.show', $rep) }}">
                {{ $rep->name }}
            </a>
        </li>
        @endforeach
    </ul>
    @endif

    {{-- OPTIONAL EXTRA SECTION: Categories --}}
    @if($supplier->categories->count())
    <h3>Categories</h3>
    <ul>
        @foreach($supplier->categories as $category)
        <li>
            <a href="{{ route('categories.show', $category) }}">
                {{ $category->name }}
            </a>
        </li>
        @endforeach
    </ul>
    @endif

    {{-- OPTIONAL EXTRA SECTION: Products --}}
    @if($supplier->products->count())
    <h3>Products</h3>
    <ul>
        @foreach($supplier->products as $product)
        <li>
            <a href="{{ route('products.show', $product) }}">
                {{ $product->name }}
            </a>
        </li>
        @endforeach
    </ul>
    @endif

    {{-- OPTIONAL EXTRA SECTION: Invoices --}}
    @if($supplier->invoices->count())
    <h3>Invoices</h3>
    <ul>
        @foreach($supplier->invoices as $invoice)
        <li>
            <a href="{{ route('invoices.show', $invoice) }}">
                Invoice #{{ $invoice->id }} — {{ $invoice->number }}
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</x-show>
