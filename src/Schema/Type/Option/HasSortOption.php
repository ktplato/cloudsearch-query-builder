<?php
declare(strict_types = 1);

namespace Kacarroll\CloudSearch\Schema\Type\Option;

trait HasSortOption
{
    protected bool $sortEnabled = false;

    public function sortEnabled(): self
    {
        $this->sortEnabled = true;

        return $this;
    }

    public function sortDisabled(): self
    {
        $this->sortEnabled = false;

        return $this;
    }
}
