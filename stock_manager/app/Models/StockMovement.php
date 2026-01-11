<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Order;
use App\Models\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class StockMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'movement_type',
        'order_id',
        'stock_id',
        'moved_at',
        'notes',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function location()
    {
        return $this->hasOneThrough(
            Location::class,
            Stock::class,
            'id',          // Stock.id
            'id',          // Location.id
            'stock_id',    // StockMovement.stock_id
            'location_id'  // Stock.location_id
        );
    }
}
