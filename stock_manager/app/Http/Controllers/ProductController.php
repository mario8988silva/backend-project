<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // route --> /products
        // fetch all records & pass into the index view

        // $products = Product::all()->paginate(25);
        $products = Product::paginate(25);

        return view('products.index', ["products" => $products]);
    }

    public function show($id){
        // route --> /products/{id}
        // fetch a single record & pass into the show view

        $product = Product::findOrFail($id);

        return view('products.show', ["product" => $product]);
    }

    public function create()
    {
        // route --> /products
        // render a create view (with web form) to products

        return view('products.create');
    }
}
