<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\SoldProduct;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('order_date', 'desc')->paginate(25);

        $representatives = \App\Models\Representative::orderBy('name')->get();
        $users = \App\Models\User::orderBy('name')->get();
        $statuses = \App\Models\Status::orderBy('state')->get();
        $suppliers = \App\Models\Supplier::orderBy('name')->get();

        return view('transactions.orders.index', [
            'orders' => $orders,
            'representatives' => $representatives,
            'users' => $users,
            'statuses' => $statuses,
            'suppliers' => $suppliers,
        ]);
    }


    public function show(Order $order)
    {
        return view('transactions.orders.show', [
            'order' => $order,
        ]);
    }

    /*
    public function create()
    {
        return view('transactions.orders.create');
    }
    */
    public function create()
    {
        // “Make an order” should start from the stock overview
        return redirect()->route('overview.index');
    }


    /*
    public function store(Request $request)
    {
        $validated = $request->validate([
            'number'      => 'required|string|max:255|unique:orders,number',
            'date'        => 'required|date',
            'client_id'   => 'nullable|exists:clients,id',
            'total'       => 'nullable|numeric|min:0',
            'status'      => 'nullable|string|max:50',
            'notes'       => 'nullable|string|max:1000',
        ]);

        $order = Order::create($validated);

        return redirect()
            ->route('orders.show', $order->id)
            ->with('success', 'Order created successfully.');
    }
    */

    public function store(Request $request)
    {
        $quantities = collect($request->input('products', []))
            ->filter(fn($qty) => $qty > 0);

        if ($quantities->isEmpty()) {
            return back()->withErrors('You must select at least one product.');
        }

        $draftStatus = Status::where('state', 'ORDER DRAFT')->first();

        $order = Order::create([
            'representative_id' => null,                // can be filled later
            'user_id'           => Auth::id(),          // the logged-in user
            'order_date'        => now(),
            'delivery_date'     => null,
            //'invoice_id'        => null,
            'status_id'         => $draftStatus?->id,   // or a default ID
        ]);

        foreach ($quantities as $productId => $qty) {
            $order->products()->attach($productId, [
                'quantity'    => $qty,
                'expiry_date' => null, // can come later
            ]);
        }

        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Order created successfully.');
    }


    public function edit(Order $order)
    {
        if ($order->status->state !== 'ORDER DRAFT') {
            return redirect()->route('orders.show', $order)->withErrors('Only draft orders can be edited.');
        }
        // Existing products in the order
        $existingProducts = $order->products;

        // Products NOT in the order
        $newProducts = \App\Models\Product::whereNotIn(
            'id',
            $existingProducts->pluck('id')
        )->orderBy('name')->get();

        // Metadata options
        $representatives = \App\Models\Representative::orderBy('name')->get();
        $statuses = \App\Models\Status::orderBy('state')->get();

        return view('transactions.orders.edit', [
            'order'            => $order,
            'existingProducts' => $existingProducts,
            'newProducts'      => $newProducts,
            'representatives'  => $representatives,
            'statuses'         => $statuses,
        ]);

        if (!$order->isDraft()) {
            return redirect()
                ->route('orders.show', $order)
                ->withErrors('Only draft orders can be edited.');
        }
    }


    /*
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'number'      => 'required|string|max:255|unique:orders,number,' . $order->id,
            'date'        => 'required|date',
            'client_id'   => 'nullable|exists:clients,id',
            'total'       => 'nullable|numeric|min:0',
            'status'      => 'nullable|string|max:50',
            'notes'       => 'nullable|string|max:1000',
        ]);

        $order->update($validated);

        return redirect()
            ->route('orders.show', $order->id)
            ->with('success', 'Order updated successfully.');
    }
    */

    public function update(Request $request, Order $order)
    {
        // Validate metadata
        $validated = $request->validate([
            'representative_id' => 'nullable|exists:representatives,id',
            'delivery_date'     => 'nullable|date',
            'status_id'         => 'required|exists:statuses,id',
            'notes'             => 'nullable|string|max:1000',
        ]);

        // Update metadata
        $order->update($validated);


        // EXISTING PRODUCTS
        $existing = collect($request->input('existing', []))
            ->map(fn($qty) => (int) $qty);

        foreach ($existing as $productId => $qty) {

            if ($qty <= 0) {
                $order->products()->detach($productId);
                continue;
            }

            $order->products()->updateExistingPivot($productId, [
                'quantity' => $qty,
            ]);
        }


        // NEW PRODUCTS
        $new = collect($request->input('new', []))
            ->map(fn($qty) => (int) $qty)
            ->filter(fn($qty) => $qty > 0);

        foreach ($new as $productId => $qty) {
            $order->products()->attach($productId, [
                'quantity' => $qty,
                'expiry_date' => null,
            ]);
        }

        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        // 1. Prevent deletion if sold products exist
        if ($order->soldProducts()->exists()) {
            return back()->withErrors('This order has sold products and cannot be deleted.');
        }

        // 2. Safe to delete
        $order->delete();

        return redirect()
            ->route('orders.index')
            ->with('success', 'Order deleted successfully.');
    }

    public function submit(Order $order)
    {
        if (!$order->isDraft()) {
            return back()->withErrors('Only draft orders can be submitted.');
        }

        $submittedStatus = Status::where('state', 'ORDER SUBMITTED')->first();


        $order->update([
            'status_id' => $submittedStatus->id,
        ]);

        return back()->with('success', 'Order submitted successfully.');
    }

    public function cancel(Order $order)
    {
        if ($order->isReceived()) {
            return back()->withErrors('Received orders cannot be cancelled.');
        }

        $cancelledStatus = Status::where('state', 'ORDER CANCELLED')->first();


        $order->update([
            'status_id' => $cancelledStatus->id,
        ]);

        return back()->with('success', 'Order cancelled.');
    }

    public function receiveForm(Order $order)
    {
        if (!$order->isSubmitted()) {
            return redirect()
                ->route('orders.show', $order)
                ->withErrors('Only submitted orders can be received.');
        }

        $locations = \App\Models\Location::orderBy('name')->get();

        return view('transactions.orders.receive', [
            'order' => $order,
            'locations' => $locations,
        ]);
    }

    public function receive(Request $request, Order $order)
    {
        if (!$order->isSubmitted()) {
            return back()->withErrors('Only submitted orders can be received.');
        }

        $data = $request->validate([
            'items' => 'required|array',
            'items.*.received_qty' => 'required|integer|min:0',
            'items.*.expiry_date' => 'nullable|date',
            'items.*.location_id' => 'nullable|exists:locations,id',
            'items.*.notes' => 'nullable|string|max:500',
        ]);

        foreach ($data['items'] as $productId => $item) {

            if ($item['received_qty'] <= 0) {
                continue;
            }

            // 1. Create stock entry
            $stock = \App\Models\Stock::create([
                'product_id' => $productId,
                'quantity' => $item['received_qty'],
                'expiry_date' => $item['expiry_date'] ?? null,
                'location_id' => $item['location_id'] ?? null,
                'status_id' => Status::where('state', 'IN STOCK')->first()->id,
                'notes' => $item['notes'] ?? null,
                'order_id' => $order->id,
            ]);

            /*
            // 2. Create stock movement
            \App\Models\StockMovement::create([
                'product_id' => $productId,
                'stock_id' => $stock->id,
                'movement_type' => 'IN',
                'quantity' => $item['received_qty'],
                'reference_type' => 'order',
                'reference_id' => $order->id,
            ]);
            */

            // 2. Create stock movement
            \App\Models\StockMovement::create([
                'product_id' => $productId,
                'stock_id' => $stock->id,
                'order_id' => $order->id,   // <-- correct field
                'movement_type' => 'IN',
                'quantity' => $item['received_qty'],
                'moved_at' => now(),
            ]);
        }

        // 3. Update order status
        $order->update([
            'status_id' => Status::where('state', 'ARRIVED')->first()->id,
        ]);

        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Order received and stock updated.');
    }

    public function arrivalCheckForm(Order $order)
    {
        if (!$order->isReceived()) {
            return redirect()
                ->route('orders.show', $order)
                ->withErrors('Only ARRIVED orders can enter Arrival Check.');
        }

        return view('transactions.orders.arrival-check', [
            'order' => $order,
        ]);
    }

    public function arrivalCheck(Request $request, Order $order)
    {
        if (!$order->isReceived()) {
            return back()->withErrors('Only ARRIVED orders can enter Arrival Check.');
        }

        $data = $request->validate([
            'invoice_number' => 'required|string|max:50',
            'invoice_date' => 'required|date',
            'invoice_total' => 'required|numeric|min:0',
            'payment_method' => 'required|string|max:50',
            'payment_confirmed' => 'required|boolean',
            'notes' => 'nullable|string|max:1000',
        ]);

        // Save invoice metadata directly on the order
        $order->update([
            'invoice_number' => $data['invoice_number'],
            'invoice_date' => $data['invoice_date'],
            'invoice_total' => $data['invoice_total'],
            'payment_method' => $data['payment_method'],
            'payment_confirmed' => $data['payment_confirmed'],
            'notes' => $data['notes'] ?? null,
            'status_id' => Status::where('state', 'ARRIVAL CHECK')->first()->id,
        ]);

        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Arrival Check completed successfully.');
    }

    public function orderCheckForm(Order $order)
    {
        if ($order->status->state !== 'ARRIVAL CHECK') {
            return redirect()
                ->route('orders.show', $order)
                ->withErrors('Only orders in ARRIVAL CHECK can enter Order Check.');
        }

        return view('transactions.orders.order-check', [
            'order' => $order,
        ]);
    }

    public function orderCheck(Request $request, Order $order)
    {
        if ($order->status->state !== 'ARRIVAL CHECK') {
            return back()->withErrors('Only orders in ARRIVAL CHECK can enter Order Check.');
        }

        $data = $request->validate([
            'items' => 'required|array',
            'items.*.checked_qty' => 'required|integer|min:0',
            'items.*.damaged_qty' => 'required|integer|min:0',
            'items.*.missing_qty' => 'required|integer|min:0',
            'items.*.notes' => 'nullable|string|max:500',
        ]);

        foreach ($data['items'] as $productId => $item) {

            // Save check results on pivot table
            $order->products()->updateExistingPivot($productId, [
                'checked_qty' => $item['checked_qty'],
                'damaged_qty' => $item['damaged_qty'],
                'missing_qty' => $item['missing_qty'],
                'check_notes' => $item['notes'] ?? null,
            ]);
        }

        // Move to next status
        $order->update([
            'status_id' => Status::where('state', 'ORDER CHECK')->first()->id,
        ]);

        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Order Check completed successfully.');
    }

    public function close(Order $order)
    {
        if ($order->status->state !== 'ORDER CHECK') {
            return back()->withErrors('Only orders in ORDER CHECK can be closed.');
        }

        $closedStatus = Status::where('state', 'ORDER CLOSED')->first();

        $order->update([
            'status_id' => $closedStatus->id,
        ]);

        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Order successfully closed.');
    }
}
