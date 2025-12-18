<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'retailer_id',
        'notes'
    ];

    public function retailer()
    {
        return $this->belongsTo(Supplier::class);
    }

    use HasFactory;
}
