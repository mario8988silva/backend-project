<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StockOverviewController extends Controller
{
    public function index()
    {
        // Load all products + their stock entries
        $products = Product::with(['stocks', 'brand', 'subcategory.category'])
            ->orderBy('id')
            ->paginate(25);

        // Load saved quantities from session
        $sessionQuantities = session('order.products', []);

        return view('stock.overview.index', [
            'products' => $products,
            'sessionQuantities' => $sessionQuantities,
        ]);
    }

    public function update(Request $request)
    {
        $products = session('order.products', []);

        foreach ($request->input('products', []) as $id => $qty) {
            $products[$id] = (int) $qty;
        }

        session(['order.products' => $products]);

        return response()->json(['success' => true]);
    }
}
