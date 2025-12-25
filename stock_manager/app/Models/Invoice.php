<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use App\Models\Supplier;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'issue_date',
        'due_date',
        'order_id',
        'supplier_id',
        'total_amount',
        'currency',
        'notes',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
