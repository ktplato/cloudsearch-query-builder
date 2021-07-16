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

    public function generateClause(): string
    {
        $phrases = [];

        foreach ($this->values as $value) {
            $phrases[] = $this->generatePhrase($value);
        }

        return Util::wrap(implode(" ", $phrases), $this->operator);
    }

    protected function generatePhrase(string $value): string
    {
        if ($this->field === null) {
            return "(term '{$value}')";
        }

        return "(term field={$this->field} '{$value}')";
    }
}