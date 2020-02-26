<?php

namespace BoxyBird\App;

use WP_Query;

abstract class Resource
{
    public static function collection(WP_Query $query): array
    {
        return static::toArray($query);
    }

    public static function item(WP_Query $query): array
    {
        return static::toArray($query)[0] ?? [];
    }
}
