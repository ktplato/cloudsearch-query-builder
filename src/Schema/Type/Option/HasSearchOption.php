<?php
declare(strict_types = 1);

namespace Kacarroll\CloudSearch\Schema\Type\Option;

trait HasSearchOption
{
    protected bool $searchEnabled = true;

    /**
     * @return static
     */
    public function searchEnabled(): self
    {
        $this->searchEnabled = true;

        return $this;
    }

    /**
     * @return static
     */
    public function searchDisabled(): self
    {
        $this->searchEnabled = false;

        return $this;
    }
}
