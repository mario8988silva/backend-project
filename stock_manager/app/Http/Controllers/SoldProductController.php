<?php

namespace App\Http\Controllers;

use App\Models\SoldProduct;
use Illuminate\Http\Request;

class SoldProductController extends Controller
{
    public function index()
    {
        $soldProducts = SoldProduct::orderBy('sold_at', 'desc')->paginate(25);

        return view('transactions.sold_products.index', [
            'sold_products' => $soldProducts,
        ]);
    }

    public function show(SoldProduct $soldProduct)
    {
        return view('transactions.sold_products.show', [
            'sold_product' => $soldProduct,
        ]);
    }

    public function create()
    {
        return view('transactions.sold_products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id'   => 'required|exists:products,id',
            'quantity'     => 'required|numeric|min:1',
            'unit_price'   => 'required|numeric|min:0',
            'total'        => 'nullable|numeric|min:0',
            'sold_at'      => 'required|date',
            'notes'        => 'nullable|string|max:1000',
        ]);

        $soldProduct = SoldProduct::create($validated);

        return redirect()
            ->route('transactions.sold-products.show', $soldProduct->id)
            ->with('success', 'Sold product recorded successfully.');
    }

    public function edit(SoldProduct $soldProduct)
    {
        return view('transactions.sold_products.edit', [
            'sold_product' => $soldProduct,
        ]);
    }

    public function update(Request $request, SoldProduct $soldProduct)
    {
        $validated = $request->validate([
            'product_id'   => 'required|exists:products,id',
            'quantity'     => 'required|numeric|min:1',
            'unit_price'   => 'required|numeric|min:0',
            'total'        => 'nullable|numeric|min:0',
            'sold_at'      => 'required|date',
            'notes'        => 'nullable|string|max:1000',
        ]);

        $soldProduct->update($validated);

        return redirect()
            ->route('transactions.sold-products.show', $soldProduct->id)
            ->with('success', 'Sold product updated successfully.');
    }

    public function destroy(SoldProduct $soldProduct)
    {
        $soldProduct->delete();

        return redirect()
            ->route('transactions.sold-products.index')
            ->with('success', 'Sold product deleted successfully.');
    }
}
