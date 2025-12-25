<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;


class NutriScore extends Model
{
    /** @use HasFactory<\Database\Factories\NutriScoreFactory> */
    use HasFactory;

    protected $fillable = [
        'grade',
        'color',
        'description',
    ];

    public function products()    {return $this->hasMany(Product::class);}
}
