<form action="{{ route('orders.store') }}" method="POST">
    @csrf

    <table>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->stocks->sum('quantity') }}</td>
            <td>
                <input type="number"
                       name="products[{{ $product->id }}]"
                       min="0">
            </td>
        </tr>
        @endforeach
    </table>

    <button type="submit">Create order</button>
</form>
