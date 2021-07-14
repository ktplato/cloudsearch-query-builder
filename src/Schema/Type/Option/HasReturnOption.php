<?php
declare(strict_types = 1);

namespace Kacarroll\CloudSearch\Schema\Type\Option;

trait HasReturnOption
{
    protected bool $returnEnabled = true;

    public function returnEnabled(): self
    {
        $this->returnEnabled = true;

        return $this;
    }

    public function returnDisabled(): self
    {
        $this->returnEnabled = false;

        return $this;
    }
}
