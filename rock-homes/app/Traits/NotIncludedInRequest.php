<?php

namespace App\Traits;

trait NotIncludedInRequest
{
    # code...
    public static function excludeFromRequest($args): array
    {
        # code...
        return request()->except($args);
    }
}