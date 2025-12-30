{{--
@include('transactions.orders._form', get_defined_vars())
--}}

<x-layout>

    <h1>Edit Order #{{ $order->id }}</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')

        @include('transactions.orders.edit._details')
        @include('transactions.orders.edit._existing_products')
        @include('transactions.orders.edit._new_products')

        <button type="submit">Save Changes</button>
    </form>

</x-layout>
