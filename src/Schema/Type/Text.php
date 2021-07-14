<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Schema\Type;

use Kacarroll\CloudSearch\Schema\FieldType;
use Kacarroll\CloudSearch\Schema\Type\Option\HasReturnOption;
use Kacarroll\CloudSearch\Schema\Type\Option\HasSortOption;
use Kacarroll\CloudSearch\Schema\Type\Option\HasHighlightOption;

class Text implements FieldType
{
    use HasHighlightOption,
        HasReturnOption,
        HasSortOption;

    private const INDEX_FIELD_TYPE = 'text';

    protected string $indexFieldName;

    public function __construct(string $fieldName)
    {
        $this->indexFieldName = $fieldName;
    }

    public function toArray(): array
    {
        return [
            'IndexFieldName' => $this->indexFieldName,
            'IndexFieldType' => self::INDEX_FIELD_TYPE,
            'TextOptions' => [
                'AnalysisScheme' => '_ja_default_',
                'DefaultValue' => '',
                'HighlightEnabled' => $this->highlightEnabled,
                'ReturnEnabled' => $this->returnEnabled,
                'SortEnabled' => $this->sortEnabled,
            ],
        ];
    }
}
