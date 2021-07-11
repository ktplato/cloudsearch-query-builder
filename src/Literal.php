<?php
declare(strict_types = 1);

namespace Kacarroll\CloudSearchQuery;

class Literal
{
    /**
     * @var (int|string)[]
     */
    protected array $values;

    protected string $field;

    public function __construct(array $values, string $field)
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