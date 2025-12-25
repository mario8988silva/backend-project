<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::orderBy('name')->paginate(25);

        return view('suppliers.index', [
            'suppliers' => $suppliers,
        ]);
    }

    public function show(Supplier $supplier)
    {
        return view('suppliers.show', [
            'supplier' => $supplier,
        ]);
    }

    public function create()
    {
        return view('suppliers.create');
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
        return view('suppliers.edit', [
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
