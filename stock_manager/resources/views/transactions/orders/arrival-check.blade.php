<x-layout>

    <h1>Arrival Check — Order #{{ $order->id }}</h1>

    <form action="{{ route('orders.arrival-check', $order) }}" method="POST">
        @csrf

        <div>
            <label>Invoice Number:</label>
            <input type="text" name="invoice_number" required>
        </div>

        <div>
            <label>Invoice Date:</label>
            <input type="date" name="invoice_date" required>
        </div>

        <div>
            <label>Invoice Total (€):</label>
            <input type="number" step="0.01" name="invoice_total" required>
        </div>

        <div>
            <label>Payment Method:</label>
            <input type="text" name="payment_method" required>
        </div>

        <div>
            <label>Payment Confirmed:</label>
            <select name="payment_confirmed" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div>
            <label>Notes:</label>
            <textarea name="notes" rows="3"></textarea>
        </div>

        <button type="submit">Confirm Arrival Check</button>

    </form>

</x-layout>
