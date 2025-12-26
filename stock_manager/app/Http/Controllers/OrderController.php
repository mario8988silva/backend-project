<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('date', 'desc')->paginate(25);

        return view('transactions.orders.index', [
            'orders' => $orders,
        ]);
    }

    public function show(Order $order)
    {
        return view('transactions.orders.show', [
            'order' => $order,
        ]);
    }

    public function create()
    {
        return view('transactions.orders.create');
    }

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
            ->route('transactions.orders.show', $order->id)
            ->with('success', 'Order created successfully.');
    }

    public function edit(Order $order)
    {
        return view('transactions.orders.edit', [
            'order' => $order,
        ]);
    }

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
            ->route('transactions.orders.show', $order->id)
            ->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()
            ->route('transactions.orders.index')
            ->with('success', 'Order deleted successfully.');
    }
}
