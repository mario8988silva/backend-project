<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\WasteLog;
use Illuminate\Http\Request;

class WasteLogController extends Controller
{
    /*
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
    */
    /*
    public function show(WasteLog $wasteLog)
    {
        return view('transactions.waste-logs.show', [
            'wasteLog' => $wasteLog,
        ]);
    }
    */
    /*
    public function destroy(WasteLog $wasteLog)
    {
        $wasteLog->delete();

        return redirect()
            ->route('waste-logs.index')
            ->with('success', 'Waste log deleted successfully.');
    }
    */
}
