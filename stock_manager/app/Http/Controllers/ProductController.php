<?php

namespace App\Http\Controllers;

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

    public function create()
    {
        // route --> /products
        // render a create view (with web form) to products
        
        $brands = Brand::all();
        $categories = Category::all();
        $ecoScores = EcoScore::all();
        $families = Family::all();
        $ivaCategories = IvaCategory::all();
        $nutriScores = NutriScore::all();
        $subcategories = Subcategory::all();
        $unitTypes = UnitType::all();

        return view('products.create', [
            "brands" => $brands,
            "categories" => $categories,
            "eco_scores" => $ecoScores,
            "families" => $families,
            "iva_categories" => $ivaCategories,
            "nutri_scores" => $nutriScores,
            "subcategories" => $subcategories,
            "unit_types" => $unitTypes
            
        ]);        
    }

    public function store(Request $request)
    {
        // route --> /products
        // handle the form submission from the create view

        $validatedProduct = $request->validate([
            //
            'barcode' => 'nullable|string|unique:products,barcode|max:45',
            'name' => 'required|string|max:255',
            'image' => 'nullable|url', // 'nullable|image'
            'description' => 'nullable|string',
            //
            'unit_type_id' => 'nullable|exists:unit_types,id',
            'iva_category_id' => 'nullable|exists:iva_categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'nutri_score_id' => 'nullable|exists:nutri_scores,id',
            'eco_score_id' => 'nullable|exists:eco_scores,id',
            
            'sugar_free' => 'boolean',
            'gluten_free' => 'boolean',
            'lactose_free' => 'boolean',
            'vegan' => 'boolean',
            'vegetarian' => 'boolean',
            'organic' => 'boolean',
            /* 
            protected $casts = [
            'sugar_free'   => 'boolean',
            'gluten_free'  => 'boolean',
            'lactose_free' => 'boolean',
            'vegan'        => 'boolean',
            'vegetarian'   => 'boolean',
            'organic'      => 'boolean',    
            ];
            */
        ]);

        // Create a new product record
        $product = Product::create($validatedProduct);

        // Redirect to the product's detail page or the products list
        return redirect()->route('products.index', $product)
            ->with('success', 'Product created successfully.');
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
