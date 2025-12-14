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
    public function index()
    {
        // route --> /products
        // fetch all records & pass into the index view

        // $products = Product::all()->paginate(25);
        $products = Product::with('subcategory', 'brand', 'unit_type', 'iva_category', 'nutri_score', 'eco_score')->paginate(25);

        return view('products.index', ["products" => $products]);
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
