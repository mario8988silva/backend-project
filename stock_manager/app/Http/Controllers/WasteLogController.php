<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\WasteLog;
use Illuminate\Http\Request;

class WasteLogController extends Controller
{
    public function index()
    {
        $wasteLogs = WasteLog::orderBy('logged_at', 'desc')->paginate(25);

        $products = \App\Models\Product::orderBy('name')->get();
        $orders = \App\Models\Order::orderBy('order_date', 'desc')->get();
        $statuses = Status::orderBy('state')->get();

        return view('transactions.waste-logs.index', [
            'waste_logs' => $wasteLogs,
            'products' => $products,
            'orders' => $orders,
            'statuses' => $statuses,
        ]);
    }


    public function show(WasteLog $wasteLog)
    {
        return view('transactions.waste-logs.show', [
            'waste_log' => $wasteLog,
        ]);
    }

    public function create()
    {
        return view('transactions.waste-logs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id'   => 'required|exists:products,id',
            'quantity'     => 'required|numeric|min:1',
            'reason'       => 'nullable|string|max:500',
            'wasted_at'    => 'required|date',
            'notes'        => 'nullable|string|max:1000',
        ]);

        $wasteLog = WasteLog::create($validated);

        return redirect()
            ->route('waste-logs.show', $wasteLog->id)
            ->with('success', 'Waste log created successfully.');
    }

    public function edit(WasteLog $wasteLog)
    {
        return view('transactions.waste-logs.edit', [
            'waste_log' => $wasteLog,
        ]);
    }

    public function update(Request $request, WasteLog $wasteLog)
    {
        $validated = $request->validate([
            'product_id'   => 'required|exists:products,id',
            'quantity'     => 'required|numeric|min:1',
            'reason'       => 'nullable|string|max:500',
            'wasted_at'    => 'required|date',
            'notes'        => 'nullable|string|max:1000',
        ]);

        $wasteLog->update($validated);

        return redirect()
            ->route('waste-logs.show', $wasteLog->id)
            ->with('success', 'Waste log updated successfully.');
    }

    public function destroy(WasteLog $wasteLog)
    {
        $wasteLog->delete();

        return redirect()
            ->route('waste-logs.index')
            ->with('success', 'Waste log deleted successfully.');
    }
}
