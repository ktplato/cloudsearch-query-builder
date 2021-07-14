<?php
declare(strict_types = 1);

namespace Kacarroll\CloudSearch\Schema\Type\Option;

trait HasHighlightOption
{
    protected bool $highlightEnabled = false;

    public function highlightEnabled(): self
    {
        $this->highlightEnabled = true;

        return $this;
    }

    public function highlightDisabled(): self
    {
        $this->highlightEnabled = false;

        return $this;
    }
}
