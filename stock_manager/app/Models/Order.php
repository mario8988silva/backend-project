<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'quantity',
        'product_id',
        'representative_id',
        'team_id',
        'order_date',
        'delivery_date',
        'invoice_id',
        'status_id',
    ];

    // Relationships
    /*
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_has_products')
            ->withPivot('quantity', 'expiry_date')
            ->withTimestamps();
    }

    public function representative()
    {
        return $this->belongsTo(Representative::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    use HasFactory;
}
