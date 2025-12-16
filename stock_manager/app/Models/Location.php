<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'address',
        'type',
    ];

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
    
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;
}
