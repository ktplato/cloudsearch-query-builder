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

    public function generateClause(): string
    {
        $phrases = [];

        foreach ($this->values as $value) {
            $phrases[] = $this->generatePhrase($value);
        }

        return Util::wrap(implode(" ", $phrases), $this->operator);
    }

    protected function generatePhrase($value): string
    {
        $wrapped = $this->wrapInSingleQuote($value);

        return "{$this->field}:{$wrapped}";
    }

    protected function wrapInSingleQuote($target)
    {
        return is_integer($target) ? $target : "'{$target}'";
    }
}