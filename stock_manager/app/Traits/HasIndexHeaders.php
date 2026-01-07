<?php

namespace App\Traits;

use Illuminate\Support\Facades\Schema;

trait HasIndexHeaders
{
    public static function indexHeaders()
    {
        $columns = Schema::getColumnListing((new self)->getTable());

        $hidden = property_exists(self::class, 'indexHidden')
            ? static::$indexHidden
            : ['id', 'created_at', 'updated_at'];

        $columns = array_diff($columns, $hidden);

        return array_map(fn($col) =>
            ucwords(str_replace('_', ' ', $col)),
        $columns);
    }
}