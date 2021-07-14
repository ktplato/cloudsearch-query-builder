<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Schema;

interface FieldType
{
    public function toArray(): array;
}