<?php
declare(strict_types = 1);

namespace Kacarroll\CloudSearch\Query;

class Literal
{
    /**
     * @var (int|string)[]
     */
    protected array $values;

    protected string $field;

    protected string $operator;

    public function __construct(array $values, string $field, string $operator = 'or')
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

    protected function generateClause($value): string
    {
        $wrapped = $this->wrapInSingleQuote($value);

        return "{$this->field}:{$wrapped}";
    }

    protected function wrapInSingleQuote($target)
    {
        return is_integer($target) ? $target : "'{$target}'";
    }
}