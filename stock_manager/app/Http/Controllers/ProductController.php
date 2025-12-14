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
use App\Models\Subcategory;
use App\Models\UnitType;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Order by created_at
        if ($request->get('order') === 'newest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($request->get('order') === 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        // Filter by brand
        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->get('brand_id'));
        }

        // Filter by subcategory
        if ($request->filled('subcategory_id')) {
            $query->where('subcategory_id', $request->get('subcategory_id'));
        }

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->get('category_id'));
        }

        // Filter by family
        if ($request->filled('family_id')) {
            $query->where('family_id', $request->get('family_id'));
        }

        // Filter by unit type
        if ($request->filled('unit_type_id')) {
            $query->where('unit_type_id', $request->get('unit_type_id'));
        }

        // Filter by IVA category
        if ($request->filled('iva_category_id')) {
            $query->where('iva_category_id', $request->get('iva_category_id'));
        }

        // Filter by NutriScore
        if ($request->filled('nutri_score_id')) {
            $query->where('nutri_score_id', $request->get('nutri_score_id'));
        }

        // Filter by EcoScore
        if ($request->filled('eco_score_id')) {
            $query->where('eco_score_id', $request->get('eco_score_id'));
        }

        // Search by anything
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                foreach ((new Product)->getFillable() as $field) {
                    $q->orWhere($field, 'like', "%{$search}%");
                }
            });
        }

        // Boolean filters
        $booleanFilters = ['sugar_free', 'gluten_free', 'vegan', 'vegetarian', 'organic'];

        foreach ($booleanFilters as $field) {
            if ($request->filled($field)) {
                $query->where($field, (bool) $request->get($field));
            }
        }


        // route --> /products
        // fetch all records & pass into the index view
        //$products = Product::with('subcategory', 'brand', 'unit_type', 'iva_category', 'nutri_score', 'eco_score')->paginate(25);
        $products = $query->with(
            'subcategory',
            'brand',
            'unit_type',
            'iva_category',
            'nutri_score',
            'eco_score'
        )->paginate(25);

        //return view('products.index', ["products" => $products]);
        // Merge products with lookup tables
        return view('products.index', array_merge(
            ['products' => $products],
            $this->getLookups()
        ));
    }

    public function show(Product $product)
    {
        // route --> /products/{id}
        // fetch a single record & pass into the show view

        $product->load('subcategory', 'brand', 'unit_type', 'iva_category', 'nutri_score', 'eco_score');

        return view('products.show', ["product" => $product]);
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

    public function destroy(Product $product)
    {
        // route --> /products/{id}
        // handle the deletion of a product

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
