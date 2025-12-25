<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Location;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with(['product', 'location'])
            ->orderBy('product_id')
            ->paginate(25);

        return view('stocks.index', [
            'stocks' => $stocks,
        ]);
    }

    public function show(Stock $stock)
    {
        $stock->load(['product', 'location']);

        return view('stocks.show', [
            'stock' => $stock,
        ]);
    }

    public function create()
    {
        return view('stocks.create', [
            'products'  => Product::orderBy('name')->get(),
            'locations' => Location::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id'  => 'required|exists:products,id',
            'location_id' => 'required|exists:locations,id',
            'quantity'    => 'required|numeric|min:0',
            'notes'       => 'nullable|string|max:1000',
        ]);

        $stock = Stock::create($validated);

        return redirect()
            ->route('stocks.show', $stock->id)
            ->with('success', 'Stock entry created successfully.');
    }

    public function edit(Stock $stock)
    {
        return view('stocks.edit', [
            'stock'     => $stock,
            'products'  => Product::orderBy('name')->get(),
            'locations' => Location::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Stock $stock)
    {
        $validated = $request->validate([
            'product_id'  => 'required|exists:products,id',
            'location_id' => 'required|exists:locations,id',
            'quantity'    => 'required|numeric|min:0',
            'notes'       => 'nullable|string|max:1000',
        ]);

        $stock->update($validated);

        return redirect()
            ->route('stocks.show', $stock->id)
            ->with('success', 'Stock updated successfully.');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect()
            ->route('stocks.index')
            ->with('success', 'Stock entry deleted successfully.');
    }
}
