<?php

namespace App\Http\Controllers;

use App\Models\Representative;
use App\Models\Supplier;
use App\Settlements\UniversalFilterSettlement;
use App\Settlements\UniversalSearchSettlement;
use App\Settlements\UniversalSortSettlement;
use Illuminate\Http\Request;

class RepresentativeController extends Controller
{
    public function index(Request $request, UniversalSearchSettlement $searchSettlement, UniversalSortSettlement $sortSettlement, UniversalFilterSettlement $filterSettlement)
    {


        // 1. Generate headers
        $headers = Representative::indexHeaders();

        // 2. Build query
        $query = Representative::query();

        // 3. Apply filters
        $filterSettlement->apply($request, $query);

        // 4. Apply search
        $searchSettlement->apply($request, $query);

        // 6. Apply sorting
        $sortSettlement->apply($request, $query);

        // 7. Pagination
        $representatives = $query->with(
            'supplier',
        )->paginate(25);

        // 8. Return view WITH headers
        //return view('products.index', ["products" => $products]);
        // Merge products with lookup tables
        return view('business.representatives.index', array_merge(
            [
                'representatives' => $representatives,
                'headers'  => $headers,
            ],
            $this->getLookups()
        ));
    }

    // Centralized lookup loader
    private function getLookups(): array
    {
        return [
            'suppliers' => Supplier::all(),
        ];
    }

    public function show(Representative $representative)
    {
        return view('business.representatives.show', [
            'representative' => $representative,
        ]);
    }

    public function create()
    {
        $suppliers = Supplier::all();

        return view('business.representatives.create', compact('suppliers'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'nullable|email|max:255',
            'phone'      => 'nullable|string|max:50',
            'active'     => 'boolean',
        ]);

        $representative = Representative::create($validated);

        return redirect()
            ->route('representatives.show', $representative->id)
            ->with('success', 'Representative created successfully.');
    }

    public function edit(Representative $representative)
    {
        $suppliers = Supplier::all();
        return view('business.representatives.edit', ['representative' => $representative, 'suppliers' => $suppliers,]);
    }

    public function update(Request $request, Representative $representative)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'nullable|email|max:255',
            'phone'      => 'nullable|string|max:50',
            'active'     => 'boolean',
        ]);

        $representative->update($validated);

        return redirect()
            ->route('representatives.show', $representative->id)
            ->with('success', 'Representative updated successfully.');
    }

    public function destroy(Representative $representative)
    {
        $representative->delete();

        return redirect()
            ->route('representatives.index')
            ->with('success', 'Representative deleted successfully.');
    }
}
