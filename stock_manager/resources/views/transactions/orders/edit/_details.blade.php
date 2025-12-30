{{-- ========================= --}}
{{-- ORDER DETAILS --}}
{{-- ========================= --}}
<h2>Order Details</h2>

<div>
    <label>Representative:</label>
    <select name="representative_id">
        <option value="">-- None --</option>
        @foreach($representatives as $rep)
            <option value="{{ $rep->id }}"
                {{ old('representative_id', $order->representative_id) == $rep->id ? 'selected' : '' }}>
                {{ $rep->name }}
            </option>
        @endforeach
    </select>
</div>

<div>
    <label>Delivery Date:</label>
    <input type="date"
           name="delivery_date"
           value="{{ old('delivery_date', $order->delivery_date) }}">
</div>

<div>
    <label>Status:</label>
    <select name="status_id">
        @foreach($statuses as $status)
            <option value="{{ $status->id }}"
                {{ old('status_id', $order->status_id) == $status->id ? 'selected' : '' }}>
                {{ $status->state }}
            </option>
        @endforeach
    </select>
</div>

<div>
    <label>Notes:</label>
    <textarea name="notes" rows="3">{{ old('notes', $order->notes) }}</textarea>
</div>
