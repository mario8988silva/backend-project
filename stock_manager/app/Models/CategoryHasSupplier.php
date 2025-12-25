<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Supplier;

class CategoryHasSupplier extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryHasSupplierFactory> */
    use HasFactory;

    protected $fillable = [
        'category_id',
        'supplier_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
