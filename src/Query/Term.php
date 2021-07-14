<?php
declare(strict_types = 1);

namespace Kacarroll\CloudSearch\Query;

class Term
{
    /**
     * @var string[]
     */
    protected array $values;

    protected ?string $field = null;

    protected string $operator;

    public function __construct(array $values, ?string $field = null, string $operator = 'or')
    {
        $this->values = $values;
        $this->field = $field;
        $this->operator = $operator;
    }

    public function generatePhrase(): string
    {
        $clauses = [];

        foreach ($this->values as $value) {
            $clauses[] = $this->generateClause($value);
        }

        return Util::wrap(implode(" ", $clauses), $this->operator);
    }

    protected function generateClause(string $value): string
    {
        if ($this->field === null) {
            return "(term '{$value}')";
        }

        return "(term field={$this->field} '{$value}')";
    }
}