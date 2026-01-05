<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\Representative;
use App\Models\User;
//use App\Models\Invoice;
use App\Models\Status;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'representative_id',
        'user_id',
        'order_date',
        'delivery_date',
        'status_id',
        //'invoice_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_has_products')
            ->withPivot(
                'quantity',
                'expiry_date',
                //'checked_qty',
                //'damaged_qty',
                //'missing_qty',
                //'check_notes'
            )
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

    /*
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
    */

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function isDraft()
    {
        return $this->status?->state === 'ORDER DRAFT';
    }

    public function isSubmitted()
    {
        return $this->status?->state === 'ORDER SUBMITTED';
    }

    public function isReceived()
    {
        return $this->status?->state === 'ARRIVED';
    }

    public function isCancelled()
    {
        return $this->status?->state === 'ORDER CANCELLED';
    }

    public function stockEntries()
    {
        return $this->hasManyThrough(
            Stock::class,
            OrderHasProduct::class,
            'order_id',              // FK on order_has_products
            'order_has_product_id',  // FK on stocks
            'id',                    // local key on orders
            'id'                     // local key on order_has_products
        );
    }


    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }

    public function hasDamagedItems()
    {
        return $this->products->sum('pivot.damaged_qty') > 0;
    }

    public function hasMissingItems()
    {
        return $this->products->sum('pivot.missing_qty') > 0;
    }

    public function hasQuantityMismatch()
    {
        foreach ($this->products as $product) {
            if ($product->pivot->checked_qty !== $product->pivot->quantity) {
                return true;
            }
        }
        return false;
    }

    public function damagedCount()
    {
        return $this->products->sum('pivot.damaged_qty');
    }

    public function missingCount()
    {
        return $this->products->sum('pivot.missing_qty');
    }

    public function mismatchCount()
    {
        $count = 0;

        foreach ($this->products as $product) {
            if ($product->pivot->checked_qty !== $product->pivot->quantity) {
                $count++;
            }
        }

        return $count;
    }

    public function lightweightTimeline()
    {
        $events = [
            'Order Created' => $this->created_at,
        ];

        // If submitted (anything beyond draft)
        if (!$this->isDraft()) {
            $events['Order Submitted'] = $this->updated_at;
        }

        // If received
        if ($this->isReceived()) {
            $events['Order Received'] = $this->updated_at;
        }

        // If stock entries exist
        if ($this->stockEntries()->exists()) {
            $events['Stock Entries Created'] = $this->stockEntries()->min('created_at');
        }

        // If stock movements exist
        if ($this->stockMovements()->exists()) {
            $events['Stock Movements Created'] = $this->stockMovements()->min('created_at');
        }

        // If closed
        if ($this->status?->state === 'ORDER CLOSED') {
            $events['Order Closed'] = $this->updated_at;
        }

        return collect($events)->sortBy(fn($time) => $time);
    }

    public function soldProducts()
    {
        return $this->hasMany(SoldProduct::class);
    }
}
