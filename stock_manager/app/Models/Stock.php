<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'product_id',
        'order_has_product_id',
        'status_id',
        'quantity',
        'location',
    ];

    // Relationships
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orderHasProduct()
    {
        return $this->belongsTo(OrderHasProduct::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /** @use HasFactory<\Database\Factories\StockFactory> */
    use HasFactory;
}
