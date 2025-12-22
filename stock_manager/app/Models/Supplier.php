<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /** @use HasFactory<\Database\Factories\SupplierFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'notes',
    ];

    public function representatives()
    {
        return $this->hasMany(Representative::class);
    }

    // A supplier can belong to many categories
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_has_supplier');
    }

    
    // A supplier can have many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
