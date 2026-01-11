<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\EcoScore;
use App\Models\Family;
use App\Models\IvaCategory;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Location;
use App\Models\NutriScore;
use App\Models\Status;
use App\Models\Subcategory;
use App\Models\UnitType;
use App\Settlements\UniversalBooleanFilterSettlement;
use App\Settlements\UniversalFilterSettlement;
use App\Settlements\UniversalSearchSettlement;
use App\Settlements\UniversalSortSettlement;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Request $request, UniversalSearchSettlement $searchSettlement, UniversalSortSettlement $sortSettlement, UniversalBooleanFilterSettlement $booleanSettlement, UniversalFilterSettlement $filterSettlement)
    {

        // 1. Generate headers
        $headers = Stock::indexHeaders();

        // 2. Build query
        $query = Stock::query();

        // 3. Apply filters
        $filterSettlement->apply($request, $query);

        // 4. Apply search
        $searchSettlement->apply($request, $query);

        // 5. Apply boolean filters
        $booleanSettlement->apply($request, $query);

        // 6. Apply sorting
        $sortSettlement->apply($request, $query);

        // 7. Pagination
        $stock = $query->with(
            'location',
            'status',
            'product',
            'product.brand',
            'product.subcategory',
            'product.subcategory.category',
            'product.subcategory.category.family',
            'product.unit_type',
            'product.iva_category',
            'product.nutri_score',
            'product.eco_score'
        )->paginate(25);

        // 8. Return view WITH headers
        //return view('products.index', ["products" => $products]);
        // Merge products with lookup tables
        return view('stock.stocks.index', array_merge(
            [
                'stocks' => $stock,
                'headers'  => $headers,
            ],
            $this->getLookups()
        ));
    }

    // Centralized lookup loader
    private function getLookups(): array
    {
        return [
            'locations' => Location::all(),
            
            'brands' => Brand::all(),
            'categories' => Category::all(),
            'eco_scores' => EcoScore::all(),
            'families' => Family::all(),
            'iva_categories' => IvaCategory::all(),
            'nutri_scores' => NutriScore::all(),
            'products' => Product::all(),
            'subcategories' => Subcategory::all(),
            'unit_types' => UnitType::all(),
            'statuses' => Status::all(),
        ];
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
