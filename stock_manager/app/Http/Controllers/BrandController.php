<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('name')->paginate(25);

        return view('reference.brands.index', [
            'brands' => $brands,
        ]);
    }

    public function show(Brand $brand)
    {
        return view('reference.brands.show', [
            'brand' => $brand,
        ]);
    }

    public function create()
    {
        return view('reference.brands._form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:brands,name',
            'active' => 'boolean',
        ]);

        $brand = Brand::create($validated);

        return redirect()
            ->route('brands.show', $brand->id)
            ->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        return view('reference.brands._form', [
            'brand' => $brand,
        ]);
    }

    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'active' => 'boolean',
        ]);

        $brand->update($validated);

        return redirect()
            ->route('brands.show', $brand->id)
            ->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()
            ->route('brands.index')
            ->with('success', 'Brand deleted successfully.');
    }
}
