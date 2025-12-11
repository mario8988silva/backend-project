<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    /** @use HasFactory<\Database\Factories\FamilyFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function categories()    {return $this->hasMany(Category::class);}
}
