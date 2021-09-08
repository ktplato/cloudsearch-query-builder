<?php
declare(strict_types = 1);

namespace Kacarroll\CloudSearch\Schema\Type\Option;

trait HasReturnOption
{
    protected bool $returnEnabled = true;

    /**
     * @return static
     */
    public function returnEnabled(): self
    {
        $this->returnEnabled = true;

        return $this;
    }

    /**
     * @return static
     */
    public function returnDisabled(): self
    {
        $this->returnEnabled = false;

        return $this;
    }
}
