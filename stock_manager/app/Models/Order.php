<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\Representative;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Status;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'representative_id',
        'user_id',
        'order_date',
        'delivery_date',
        'invoice_id',
        'status_id',
    ];

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }


    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
