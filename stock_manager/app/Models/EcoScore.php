<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;


class EcoScore extends Model
{
    /** @use HasFactory<\Database\Factories\EcoScoreFactory> */
    use HasFactory;
    
    protected $fillable = [
        'name',
        'color',
        'description',
    ];

    public function products()    {return $this->hasMany(Product::class);}
}
