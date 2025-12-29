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
            ->orderBy('name')
            ->paginate(50);

        return view('stock.overview.index', compact('products'));
    }
}
