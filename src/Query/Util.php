<?php
declare(strict_types = 1);

namespace Kacarroll\CloudSearch\Query;

class Util
{
    public static function wrap(string $clause, string $operator = "or"): string
    {
        return "({$operator} $clause)";
    }
}