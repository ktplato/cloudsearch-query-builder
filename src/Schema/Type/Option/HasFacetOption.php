<?php
declare(strict_types = 1);

namespace Kacarroll\CloudSearch\Schema\Type\Option;

trait HasFacetOption
{
    protected bool $facetEnabled = false;

    public function facetEnabled(): self
    {
        $this->facetEnabled = true;

        return $this;
    }

    public function facetDisabled(): self
    {
        $this->facetEnabled = false;

        return $this;
    }
}
