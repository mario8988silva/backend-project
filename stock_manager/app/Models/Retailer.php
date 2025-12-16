<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'notes',
        'category_id',
        'category_family_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')
            ->where('family_id', $this->category_family_id);
    }

    public function representatives()
    {
        return $this->hasMany(Representative::class);
    }

    use HasFactory;
}
