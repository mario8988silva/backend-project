<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderSessionController extends Controller
{
    public function update(Request $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;

        session()->put("order.products.$productId", $quantity);

        return response()->json(['success' => true]);
    }
}

