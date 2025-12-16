<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'product_id',
        'ordered_product_id',
        'status_id',
        'quantity',
        'location',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orderedProduct()
    {
        return $this->belongsTo(OrderedProduct::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /** @use HasFactory<\Database\Factories\StockFactory> */
    use HasFactory;
}
