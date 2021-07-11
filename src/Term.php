<?php
declare(strict_types = 1);

namespace Kacarroll\CloudSearchQuery;

class Term
{
    protected array $values;

    protected ?string $field = null;

    public function __construct(array $values, ?string $field = null)
    {
        $this->values = $values;
        $this->field = $field;
    }

    public function generatePhrase(): string
    {
        $clauses = [];

        foreach ($this->values as $value) {
            $clauses[] = $this->generateClause($value);
        }

        return Util::wrap(implode(" ", $clauses));
    }

    protected function generateClause(string $value): string
    {
        if ($this->field === null) {
            return "(term '{$value}')";
        }

        return "(term field={$this->field} '{$value}')";
    }
}