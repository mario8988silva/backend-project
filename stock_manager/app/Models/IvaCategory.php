<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;


class IvaCategory extends Model
{
    /** @use HasFactory<\Database\Factories\IvaCategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'rate',
        'description',
    ];

    public function products()    {return $this->hasMany(Product::class);}
}
