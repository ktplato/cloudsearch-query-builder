<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Schema;

use Kacarroll\CloudSearch\Schema\Type\Date;
use Kacarroll\CloudSearch\Schema\Type\DateArray;
use Kacarroll\CloudSearch\Schema\Type\Literal;
use Kacarroll\CloudSearch\Schema\Type\Double;
use Kacarroll\CloudSearch\Schema\Type\DoubleArray;
use Kacarroll\CloudSearch\Schema\Type\IntArray;
use Kacarroll\CloudSearch\Schema\Type\Integer;
use Kacarroll\CloudSearch\Schema\Type\Latlon;
use Kacarroll\CloudSearch\Schema\Type\LiteralArray;
use Kacarroll\CloudSearch\Schema\Type\Text;
use Kacarroll\CloudSearch\Schema\Type\TextArray;

class Builder
{
    /**
     * @var FieldType[]
     */
    protected array $fields = [];

    public function build(): array
    {
        $indexes = [];

        foreach ($this->fields as $field) {
            $indexes[] = $field->toArray();
        }

        return $indexes;
    }

    protected function addField(FieldType $field): void
    {
        $this->fields[] = $field;
    }

    public function int(string $fieldName): Integer
    {
        $field = new Integer($fieldName);

        $this->addField($field);

        return $field;
    }

    public function intArray(string $fieldName): IntArray
    {
        $field = new IntArray($fieldName);

        $this->addField($field);

        return $field;
    }

    public function double(string $fieldName): Double
    {
        $field = new Double($fieldName);

        $this->addField($field);

        return $field;
    }

    public function doubleArray(string $fieldName): DoubleArray
    {
        $field = new DoubleArray($fieldName);

        $this->addField($field);

        return $field;
    }

    public function literal(string $fieldName): Literal
    {
        $field = new Literal($fieldName);

        $this->addField($field);

        return $field;
    }

    public function literalArray(string $fieldName): LiteralArray
    {
        $field = new LiteralArray($fieldName);

        $this->addField($field);

        return $field;
    }

    public function text(string $fieldName): Text
    {
        $field = new Text($fieldName);

        $this->addField($field);

        return $field;
    }

    public function textArray(string $fieldName): TextArray
    {
        $field = new TextArray($fieldName);

        $this->addField($field);

        return $field;
    }

    public function date(string $fieldName): Date
    {
        $field = new Date($fieldName);

        $this->addField($field);

        return $field;
    }

    public function dateArray(string $fieldName): DateArray
    {
        $field = new DateArray($fieldName);

        $this->addField($field);

        return $field;
    }

    public function latlon(string $fieldName): Latlon
    {
        $field = new Latlon($fieldName);

        $this->addField($field);

        return $field;
    }
}
