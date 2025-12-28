<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Location;
use App\Models\Status;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $query = Stock::with(['product', 'orderHasProduct', 'status']);

        if ($request->filled('product_id')) {
            $query->where('product_id', $request->product_id);
        }

        if ($request->filled('status_id')) {
            $query->where('status_id', $request->status_id);
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        $stocks = $query->paginate(20)->withQueryString();

        $products = Product::all();
        $statuses = Status::all();

        return view('stock.stocks.index', compact('stocks', 'products', 'statuses'));
    }

    public function show(Stock $stock)
    {
        $stock->load(['product', 'location']);

        return view('stock.stocks.show', [
            'stock' => $stock,
        ]);
    }

    public function create()
    {
        return view('stock.stocks.create', [
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
        return view('stock.stocks.edit', [
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
