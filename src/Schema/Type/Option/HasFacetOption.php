<?php
declare(strict_types = 1);

namespace Kacarroll\CloudSearch\Schema\Type\Option;

trait HasFacetOption
{
    protected bool $facetEnabled = false;

    /**
     * @return static
     */
    public function facetEnabled(): self
    {
        $this->facetEnabled = true;

        return $this;
    }

    /**
     * @return static
     */
    public function facetDisabled(): self
    {
        $this->facetEnabled = false;

        return $this;
    }
}
