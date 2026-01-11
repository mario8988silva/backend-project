<?php

namespace App\Http\Controllers;

use App\Models\Supplier;

use App\Settlements\UniversalFilterSettlement;
use App\Settlements\UniversalSearchSettlement;
use App\Settlements\UniversalSortSettlement;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request, UniversalSearchSettlement $searchSettlement, UniversalSortSettlement $sortSettlement, UniversalFilterSettlement $filterSettlement)
    {

        // 1. Generate headers
        $headers = Supplier::indexHeaders();

        // 2. Build query
        $query = Supplier::query();

        // 3. Apply filters
        $filterSettlement->apply($request, $query);

        // 4. Apply search
        $searchSettlement->apply($request, $query);

        // 6. Apply sorting
        $sortSettlement->apply($request, $query);

        // 7. Pagination
        $suppliers = $query->paginate(25);

        // 8. Return view WITH headers
        //return view('products.index', ["products" => $products]);
        // Merge products with lookup tables
        return view('business.suppliers.index', array_merge(
            [
                'suppliers' => $suppliers,
                'headers'  => $headers,
            ],
        ));
    }

    public function show(Supplier $supplier)
    {
        return view('business.suppliers.show', [
            'supplier' => $supplier,
        ]);
    }

    public function create()
    {
        return view('business.suppliers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255|unique:suppliers,name',
            'email'         => 'nullable|email|max:255',
            'phone'         => 'nullable|string|max:50',
            'address'       => 'nullable|string|max:500',
            'vat_number'    => 'nullable|string|max:50',
            'active'        => 'boolean',
        ]);

        $supplier = Supplier::create($validated);

        return redirect()
            ->route('suppliers.show', $supplier->id)
            ->with('success', 'Supplier created successfully.');
    }

    public function edit(Supplier $supplier)
    {
        return view('business.suppliers.edit', [
            'supplier' => $supplier,
        ]);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255|unique:suppliers,name,' . $supplier->id,
            'email'         => 'nullable|email|max:255',
            'phone'         => 'nullable|string|max:50',
            'address'       => 'nullable|string|max:500',
            'vat_number'    => 'nullable|string|max:50',
            'active'        => 'boolean',
        ]);

        $supplier->update($validated);

        return redirect()
            ->route('suppliers.show', $supplier->id)
            ->with('success', 'Supplier updated successfully.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Supplier deleted successfully.');
    }
}
