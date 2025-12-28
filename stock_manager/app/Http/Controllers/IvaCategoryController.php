<?php

namespace App\Http\Controllers;

use App\Models\IvaCategory;
use Illuminate\Http\Request;

class IvaCategoryController extends Controller
{
    public function index()
    {
        $ivaCategories = IvaCategory::orderBy('name')->paginate(25);

        return view('reference.iva-categories.index', [
            'iva_categories' => $ivaCategories,
        ]);
    }

    public function show(IvaCategory $ivaCategory)
    {
        return view('reference.iva-categories.show', [
            'iva_category' => $ivaCategory,
        ]);
    }

    public function create()
    {
        return view('reference.iva-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:iva_categories,name',
            'rate'   => 'required|numeric|min:0|max:100',
            'active' => 'boolean',
        ]);

        $ivaCategory = IvaCategory::create($validated);

        return redirect()
            ->route('iva-categories.show', $ivaCategory->id)
            ->with('success', 'IVA category created successfully.');
    }

    public function edit(IvaCategory $ivaCategory)
    {
        return view('reference.iva-categories.edit', [
            'iva_category' => $ivaCategory,
        ]);
    }

    public function update(Request $request, IvaCategory $ivaCategory)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:iva_categories,name,' . $ivaCategory->id,
            'rate'   => 'required|numeric|min:0|max:100',
            'active' => 'boolean',
        ]);

        $ivaCategory->update($validated);

        return redirect()
            ->route('iva-categories.show', $ivaCategory->id)
            ->with('success', 'IVA category updated successfully.');
    }

    public function destroy(IvaCategory $ivaCategory)
    {
        $ivaCategory->delete();

        return redirect()
            ->route('iva-categories.index')
            ->with('success', 'IVA category deleted successfully.');
    }
}
