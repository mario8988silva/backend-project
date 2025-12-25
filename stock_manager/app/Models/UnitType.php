<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;


class UnitType extends Model
{
    /** @use HasFactory<\Database\Factories\UnitTypeFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'symbol',
        'description',
    ];

    public function products()    {return $this->hasMany(Product::class);}
}
