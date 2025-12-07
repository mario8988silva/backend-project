<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcoScore extends Model
{
    /** @use HasFactory<\Database\Factories\EcoScoreFactory> */
    use HasFactory;
    
    protected $fillable = [
        'grade',
        'color',
        'description',
    ];
}
