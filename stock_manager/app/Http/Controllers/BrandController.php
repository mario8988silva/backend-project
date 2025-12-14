<?php

namespace App\Http\Controllers;

use App\Models\Brand;

use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        // route --> /brands
        // fetch all records & pass into the index view

        $brands = Brand::all();

        return view('brands.index', ["brands" => $brands]);
    }

    public function show(Brand $brand)
    {
        // route --> /brands/{id}
        // fetch a single record & pass into the show view

        return view('brands.show', compact('brand'));
    }

    public function create()
    {
        // route --> /brands
        // render a create view (with web form) to brands


        return view('brands.create');
    }

    public function store(Request $request)
    {
        // route --> /brands
        // handle the form submission from the create view

        $validatedBrand = $request->validate([
            //
            'name' => 'required|string|max:255',
            'country' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255', 
        ]);

        // Create a new brands record
        $brand = Brand::create($validatedBrand);

        // Redirect to the brand's detail page or the brands list
        return redirect()->route('brands.index')
            ->with('success', 'Brand created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
        'name'        => 'required|string|max:255|unique:brands,name,' . $brand->id,
        'country'     => 'nullable|string|max:255',
        'description' => 'nullable|string|max:255',
    ]);

    $brand->update($validated);

    return redirect()->route('brands.index')
        ->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        // route --> /brands/{id}
        // handle the deletion of a product

        $brand->delete();

        return redirect()->route('brands.index')
            ->with('success', 'Brand deleted successfully.');
    }
}
