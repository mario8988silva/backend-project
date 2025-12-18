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
        'supplier_id',
        'notes'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    use HasFactory;
}
