<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutriScore extends Model
{
    /** @use HasFactory<\Database\Factories\NutriScoreFactory> */
    use HasFactory;

    protected $fillable = [
        'grade',
        'color',
        'description',
    ];
}
