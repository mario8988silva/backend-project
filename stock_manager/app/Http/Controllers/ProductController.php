<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        // route --> /products
        // fetch all records & pass into the index view

        $products = Product::all();

        return view('products.index', ["products" => $products]);
    }

    public function show(Product $product)
    {
        // route --> /products/{id}
        // fetch a single record & pass into the show view
        return view('products.show', ["product" => $product->load([
            'brand', 'subcategory', 'unitType', 'nutriScore', 'ecoScore'
        ])]);
    }
/*
    public function create()
    {
        // route --> /products
        // render a create view (with web form) to products

    }
*/
    
}
