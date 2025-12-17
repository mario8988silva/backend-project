<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
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

    public function retailer()
    {
        return $this->belongsTo(Retailer::class);
    }

    // A retailer can belong to many categories
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_has_retailer');
    }

    /*
    // A retailer can have many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    */

    public function invoices()
{
    return $this->hasMany(Invoice::class);
}

    use HasFactory;
}
