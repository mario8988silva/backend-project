<?php

namespace App\Http\Controllers;

use App\Models\StockMovement;
use App\Models\Product;
use App\Models\Location;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    public function index()
    {
        $movements = StockMovement::with(['product', 'location'])
            ->orderBy('moved_at', 'desc')
            ->paginate(25);

        return view('stock_movements.index', [
            'movements' => $movements,
        ]);
    }

    public function show(StockMovement $stockMovement)
    {
        $stockMovement->load(['product', 'location']);

        return view('stock_movements.show', [
            'movement' => $stockMovement,
        ]);
    }

    public function create()
    {
        return view('stock_movements.create', [
            'products'  => Product::orderBy('name')->get(),
            'locations' => Location::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id'  => 'required|exists:products,id',
            'location_id' => 'required|exists:locations,id',
            'type'        => 'required|string|in:in,out,transfer,adjustment',
            'quantity'    => 'required|numeric|min:0.01',
            'moved_at'    => 'required|date',
            'notes'       => 'nullable|string|max:1000',
        ]);

        $movement = StockMovement::create($validated);

        return redirect()
            ->route('stock-movements.show', $movement->id)
            ->with('success', 'Stock movement recorded successfully.');
    }

    public function edit(StockMovement $stockMovement)
    {
        return view('stock_movements.edit', [
            'movement'  => $stockMovement,
            'products'  => Product::orderBy('name')->get(),
            'locations' => Location::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, StockMovement $stockMovement)
    {
        $validated = $request->validate([
            'product_id'  => 'required|exists:products,id',
            'location_id' => 'required|exists:locations,id',
            'type'        => 'required|string|in:in,out,transfer,adjustment',
            'quantity'    => 'required|numeric|min:0.01',
            'moved_at'    => 'required|date',
            'notes'       => 'nullable|string|max:1000',
        ]);

        $stockMovement->update($validated);

        return redirect()
            ->route('stock-movements.show', $stockMovement->id)
            ->with('success', 'Stock movement updated successfully.');
    }

    public function destroy(StockMovement $stockMovement)
    {
        $stockMovement->delete();

        return redirect()
            ->route('stock-movements.index')
            ->with('success', 'Stock movement deleted successfully.');
    }
}
