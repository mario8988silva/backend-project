<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice',
        'date',
        'order_id',
        'retailer_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function retailer()
    {
        return $this->belongsTo(Retailer::class);
    }
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory;
}
