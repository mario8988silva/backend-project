<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;


class Brand extends Model
{
    /** @use HasFactory<\Database\Factories\BrandFactory> */
    use HasFactory;
    
    protected $fillable = [
        'name',
        'country',
        'description',
    ];

    public function products()    {return $this->hasMany(Product::class);}
}
