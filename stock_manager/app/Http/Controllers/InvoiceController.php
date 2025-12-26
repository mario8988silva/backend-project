<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::orderBy('date', 'desc')->paginate(25);

        return view('transactions.invoices.index', [
            'invoices' => $invoices,
        ]);
    }

    public function show(Invoice $invoice)
    {
        return view('transactions.invoices.show', [
            'invoice' => $invoice,
        ]);
    }

    public function create()
    {
        return view('transactions.invoices.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number'        => 'required|string|max:255|unique:invoices,number',
            'date'          => 'required|date',
            'supplier_id'   => 'nullable|exists:suppliers,id',
            'total'         => 'nullable|numeric|min:0',
            'notes'         => 'nullable|string|max:1000',
            'status'        => 'nullable|string|max:50',
        ]);

        $invoice = Invoice::create($validated);

        return redirect()
            ->route('transactions.invoices.show', $invoice->id)
            ->with('success', 'Invoice created successfully.');
    }

    public function edit(Invoice $invoice)
    {
        return view('transactions.invoices.edit', [
            'invoice' => $invoice,
        ]);
    }

    public function update(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'number'        => 'required|string|max:255|unique:invoices,number,' . $invoice->id,
            'date'          => 'required|date',
            'supplier_id'   => 'nullable|exists:suppliers,id',
            'total'         => 'nullable|numeric|min:0',
            'notes'         => 'nullable|string|max:1000',
            'status'        => 'nullable|string|max:50',
        ]);

        $invoice->update($validated);

        return redirect()
            ->route('transactions.invoices.show', $invoice->id)
            ->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()
            ->route('transactions.invoices.index')
            ->with('success', 'Invoice deleted successfully.');
    }
}
