<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Supplier;
use App\Traits\HasIndexHeaders;

class Representative extends Model
{
    use HasFactory, HasIndexHeaders;

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


    // -----------------------------------------
    public static function searchable(): array
    {
        return [
            'name',
            'phone',
            'email',
            'supplier_id',
            'notes'
        ];
    }

    // -----------------------------------------
    public static function sortable(): array
    {
        return [
            'name',
            'phone',
            'email',
            'supplier_id',
            'notes'
        ];
    }

    public static function relationSorts(): array
    {
        return [
            'supplier' => [
                ['table' => 'suppliers', 'local' => 'supplier_id', 'foreign' => 'suppliers.id'],
                'suppliers.name',
            ],
        ];
    }

    // -----------------------------------------

    public static function localFilters(): array
    {
        return [
            'name',
            'phone',
            'email',
            'supplier_id',
            'notes'
        ];
    }
    public static function foreignFilters(): array
    {
        return [
            'supplier_id' => fn($q, $v) =>
            $q->whereHas('supplier', fn($q2) => $q2->where('id', $v)),
        ];
    }

    // -----------------------------------------
}
