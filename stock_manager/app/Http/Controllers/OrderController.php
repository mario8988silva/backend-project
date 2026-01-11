<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Representative;
use App\Models\Status;
use App\Models\User;
use App\Models\Location;
use App\Models\Stock;
use App\Models\StockMovement;
use App\Settlements\UniversalFilterSettlement;
use App\Settlements\UniversalSearchSettlement;
use App\Settlements\UniversalSortSettlement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // INDEX — Filters + Sorting + Pagination

    public function index(Request $request, UniversalSearchSettlement $searchSettlement, UniversalSortSettlement $sortSettlement, UniversalFilterSettlement $filterSettlement)
    {

        // 1. Generate headers
        $headers = Order::indexHeaders();

        // 2. Build query
        $query = Order::query();

        // 3. Apply filters
        $filterSettlement->apply($request, $query);

        // 4. Apply search
        $searchSettlement->apply($request, $query);

        // 6. Apply sorting
        $sortSettlement->apply($request, $query);

        // 7. Pagination
        $orders = $query->with(
            'representative',
            'user',
            'status',
        )->paginate(25);

        // 8. Return view WITH headers
        //return view('products.index', ["products" => $products]);
        // Merge products with lookup tables
        return view('transactions.orders.index', array_merge(
            [
                'orders' => $orders,
                'headers'  => $headers,
            ],
            $this->getLookups()
        ));
    }

    // Centralized lookup loader
    private function getLookups(): array
    {
        return [
            'representatives' => Representative::all(),
            'users' => User::all(),
            'statuses' => Status::all(),
        ];
    }

    // SHOW

    public function show(Order $order)
    {
        $order->load(['representative', 'user', 'status', 'products']);
        return view('transactions.orders.show', compact('order'));
    }

    // CREATE — Redirect to stock overview

    public function create()
    {
        return redirect()->route('overview.index');
    }


    // STORE — Create Draft Order

    public function store(Request $request)
    {
        // 1. Load everything from the session
        $sessionQuantities = session('order.products', []);

        // 2. Load only the current page inputs
        $pageQuantities = $request->input('products', []);

        // 3. Merge using array union (preserves numeric keys)
        $merged = $sessionQuantities + $pageQuantities;

        // 4. Filter out zeros and cast quantities
        $merged = collect($merged)
            ->filter(fn($qty, $productId) => $productId > 0 && (int)$qty > 0)
            ->map(fn($qty) => (int)$qty);

        if ($merged->isEmpty()) {
            return back()->withErrors('You must select at least one product.');
        }

        // 5. Create the order
        $draftStatus = Status::firstWhere('state', 'ORDER DRAFT');

        $order = Order::create([
            'representative_id' => null,
            'user_id'           => Auth::id(),
            'order_date'        => now(),
            'delivery_date'     => null,
            'status_id'         => $draftStatus?->id,
        ]);

        // 6. Attach products
        foreach ($merged as $productId => $qty) {
            $order->products()->attach($productId, [
                'quantity'    => $qty,
                'expiry_date' => null,
            ]);
        }

        // 7. Clear session
        session()->forget('order.products');

        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Order created successfully.');
    }


    // EDIT — Only Draft Orders

    public function edit(Order $order)
    {
        if (! $order->isDraft()) {
            return redirect()->route('orders.show', $order)
                ->withErrors('Only draft orders can be edited.');
        }

        $existingProducts = $order->products;

        $newProducts = Product::whereNotIn(
            'id',
            $existingProducts->pluck('id')
        )->orderBy('name')->get();

        return view('transactions.orders.edit', [
            'order'            => $order,
            'existingProducts' => $existingProducts,
            'newProducts'      => $newProducts,
            'representatives'  => Representative::orderBy('name')->get(),
            'statuses'         => Status::orderBy('state')->get(),
        ]);
    }

    // UPDATE — Metadata + Pivot Updates

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'representative_id' => 'nullable|exists:representatives,id',
            'delivery_date'     => 'nullable|date',
            'status_id'         => 'required|exists:statuses,id',
            'notes'             => 'nullable|string|max:1000',
        ]);

        $order->update($validated);

        // Existing products
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

        // New products
        $new = collect($request->input('new', []))
            ->map(fn($qty) => (int) $qty)
            ->filter(fn($qty) => $qty > 0);

        foreach ($new as $productId => $qty) {
            $order->products()->attach($productId, [
                'quantity'    => $qty,
                'expiry_date' => null,
            ]);
        }

        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Order updated successfully.');
    }


    // DELETE — Only if no sold products

    public function destroy(Order $order)
    {
        if ($order->soldProducts()->exists()) {
            return back()->withErrors('This order has sold products and cannot be deleted.');
        }

        $order->delete();

        return redirect()
            ->route('orders.index')
            ->with('success', 'Order deleted successfully.');
    }

    // SUBMIT

    public function submit(Order $order)
    {
        if (! $order->isDraft()) {
            return back()->withErrors('Only draft orders can be submitted.');
        }

        $submitted = Status::firstWhere('state', 'ORDER SUBMITTED');

        $order->update(['status_id' => $submitted->id]);

        return back()->with('success', 'Order submitted successfully.');
    }

    // CANCEL

    public function cancel(Order $order)
    {
        if ($order->isReceived()) {
            return back()->withErrors('Received orders cannot be cancelled.');
        }

        $cancelled = Status::firstWhere('state', 'ORDER CANCELLED');

        $order->update(['status_id' => $cancelled->id]);

        return back()->with('success', 'Order cancelled.');
    }

    // RECEIVE — Form

    public function receiveForm(Order $order)
    {
        if (! $order->isSubmitted()) {
            return redirect()->route('orders.show', $order)
                ->withErrors('Only submitted orders can be received.');
        }

        return view('transactions.orders.receive', [
            'order'     => $order,
            'locations' => Location::orderBy('name')->get(),
        ]);
    }

    // RECEIVE — Process

    public function receive(Request $request, Order $order)
    {
        if (! $order->isSubmitted()) {
            return back()->withErrors('Only submitted orders can be received.');
        }

        $data = $request->validate([
            'items' => 'required|array',
            'items.*.received_qty' => 'required|integer|min:0',
            'items.*.expiry_date'  => 'nullable|date',
            'items.*.location_id'  => 'nullable|exists:locations,id',
            'items.*.notes'        => 'nullable|string|max:500',
        ]);

        foreach ($data['items'] as $productId => $item) {
            if ($item['received_qty'] <= 0) {
                continue;
            }

            // 1. Find or create aggregated stock row
            $stock = Stock::firstOrCreate(
                ['product_id' => $productId],
                [
                    'quantity' => 0,
                    'location_id' => $item['location_id'] ?? null,
                    'status_id' => Status::firstWhere('state', 'IN STOCK')->id,
                    'order_has_product_id' => $order->products()->where('product_id', $productId)->first()->pivot->id,
                ]
            );

            // 2. Increment quantity
            $stock->increment('quantity', $item['received_qty']);

            // 3. Log movement
            StockMovement::create([
                'product_id'   => $productId,
                'stock_id'     => $stock->id,
                'order_id'     => $order->id,
                'movement_type' => 'IN',
                'quantity'     => $item['received_qty'],
                'moved_at'     => now(),
            ]);
        }

        $order->update([
            'status_id' => Status::firstWhere('state', 'ARRIVED')->id,
        ]);

        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Order received and stock updated.');
    }

    public function autoReceive(Order $order)
    {
        if (! $order->isSubmitted()) {
            return back()->withErrors('Only submitted orders can be marked as received.');
        }

        foreach ($order->products as $product) {
            $qty = $product->pivot->quantity;

            if ($qty <= 0) {
                continue;
            }

            $stock = Stock::create([
                'product_id' => $product->id,
                'quantity'   => $qty,
                'location_id' => null,
                'status_id'  => Status::firstWhere('state', 'IN STOCK')->id,
                'order_has_product_id' => $product->pivot->id,
            ]);

            StockMovement::create([
                'product_id'   => $product->id,
                'stock_id'     => $stock->id,
                'order_id'     => $order->id,
                'movement_type' => 'IN',
                'quantity'     => $qty,
                'moved_at'     => now(),
            ]);
        }

        $order->update([
            'status_id' => Status::firstWhere('state', 'ARRIVED')->id,
        ]);

        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Order automatically received and stock updated.');
    }


    // ARRIVAL CHECK

    public function arrivalCheckForm(Order $order)
    {
        if (! $order->isReceived()) {
            return redirect()->route('orders.show', $order)
                ->withErrors('Only ARRIVED orders can enter Arrival Check.');
        }

        return view('transactions.orders.arrival-check', compact('order'));
    }

    public function arrivalCheck(Request $request, Order $order)
    {
        if (! $order->isReceived()) {
            return back()->withErrors('Only ARRIVED orders can enter Arrival Check.');
        }

        $data = $request->validate([
            'notes' => 'nullable|string|max:1000',
        ]);

        $order->update([
            'notes'     => $data['notes'] ?? null,
            'status_id' => Status::firstWhere('state', 'ARRIVAL CHECK')->id,
        ]);

        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Arrival Check completed successfully.');
    }


    // ORDER CHECK

    public function orderCheckForm(Order $order)
    {
        if ($order->status->state !== 'ARRIVAL CHECK') {
            return redirect()->route('orders.show', $order)
                ->withErrors('Only orders in ARRIVAL CHECK can enter Order Check.');
        }

        return view('transactions.orders.order-check', compact('order'));
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
            'items.*.notes'       => 'nullable|string|max:500',
        ]);

        foreach ($data['items'] as $productId => $item) {
            $order->products()->updateExistingPivot($productId, [
                'checked_qty' => $item['checked_qty'],
                'damaged_qty' => $item['damaged_qty'],
                'missing_qty' => $item['missing_qty'],
                'check_notes' => $item['notes'] ?? null,
            ]);
        }

        $order->update([
            'status_id' => Status::firstWhere('state', 'ORDER CHECK')->id,
        ]);

        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Order Check completed successfully.');
    }


    // CLOSE ORDER

    public function close(Order $order)
    {
        if ($order->status->state !== 'ORDER CHECK') {
            return back()->withErrors('Only orders in ORDER CHECK can be closed.');
        }

        $closed = Status::firstWhere('state', 'ORDER CLOSED');

        $order->update(['status_id' => $closed->id]);

        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Order successfully closed.');
    }
}
