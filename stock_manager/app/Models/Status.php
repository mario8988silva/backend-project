<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\OrderHasProduct;
use App\Models\Stock;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['state', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orderedProducts()
    {
        return $this->hasMany(OrderHasProduct::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
