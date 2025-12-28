<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\EcoScore;
use App\Models\Family;
use App\Models\IvaCategory;
use App\Models\NutriScore;
use App\Models\Product;
use App\Models\Status;
use App\Models\Subcategory;
use App\Models\UnitType;
use App\Models\WasteLog;
use App\Settlements\ProductBooleanFilterSettlement;
use App\Settlements\ProductFilterSettlement;
use App\Settlements\ProductSearchSettlement;
use App\Settlements\ProductSortSettlement;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, ProductSearchSettlement $searchSettlement, ProductSortSettlement $sortSettlement, ProductBooleanFilterSettlement $booleanSettlement, ProductFilterSettlement $filterSettlement)
    {

        // 1. Generate headers
        $headers = Product::indexHeaders();
        // 2. Build query
        $query = Product::query();

        // 3. Apply filters
        $filterSettlement->apply($request, $query);

        // 4. Apply search
        $searchSettlement->apply($request, $query);

        // 5. Apply boolean filters
        $booleanSettlement->apply($request, $query);

        // 6. Apply sorting
        $sortSettlement->apply($request, $query);

        // 7. Pagination
        $products = $query->with(
            'subcategory.category.family',
            'brand',
            'unit_type',
            'iva_category',
            'nutri_score',
            'eco_score'
        )->paginate(25);

        // 8. Return view WITH headers
        //return view('products.index', ["products" => $products]);
        // Merge products with lookup tables
        return view('products.index', array_merge(
            [
                'products' => $products,
                'headers'  => $headers,
            ],
            $this->getLookups()
        ));
    }

    public function show(Product $product)
    {
        $product->load('subcategory', 'brand', 'unit_type', 'iva_category', 'nutri_score', 'eco_score');

        return view('products.show', [
            'product'   => $product,
            'statuses'  => Status::all(),
        ]);
    }


    // Centralized lookup loader
    private function getLookups(): array
    {
        return [
            'brands' => Brand::all(),
            'categories' => Category::all(),
            'eco_scores' => EcoScore::all(),
            'families' => Family::all(),
            'iva_categories' => IvaCategory::all(),
            'nutri_scores' => NutriScore::all(),
            'subcategories' => Subcategory::all(),
            'unit_types' => UnitType::all(),
            'statuses' => Status::all(),
        ];
    }

    public function create()
    {
        // route --> /products
        // render a create view (with web form) to products

        return view('products.create', $this->getLookups());
    }

    public function store(ProductRequest $request)
    {
        // route --> /products
        // handle the form submission from the create view

        $product = Product::create($request->validated());

        // Redirect to the product's detail page or the products list
        return redirect()->route('products.show', $product->id)
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', array_merge(
            ['product' => $product],
            $this->getLookups()
        ));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()
            ->route('products.show', $product->id)
            ->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product, Request $request)
    {
        $statuses = Status::where('state', 'Removed from Catalog')->value('id');

        $quantity = $request->input('quantity', 1);

        WasteLog::create([
            'product_id' => $product->id,
            'status_id'  => $statuses,
            'quantity'   => $quantity,
            'logged_at'  => now(),
            'notes'      => $request->input('notes'),
        ]);

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product removed and logged as waste.');
    }
}
