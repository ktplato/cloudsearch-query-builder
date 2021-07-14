<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Schema\Type;

use Kacarroll\CloudSearch\Schema\FieldType;
use Kacarroll\CloudSearch\Schema\Type\Option\HasFacetOption;
use Kacarroll\CloudSearch\Schema\Type\Option\HasReturnOption;
use Kacarroll\CloudSearch\Schema\Type\Option\HasSearchOption;
use Kacarroll\CloudSearch\Schema\Type\Option\HasSortOption;

class Date implements FieldType
{
    use HasSearchOption,
        HasFacetOption,
        HasReturnOption,
        HasSortOption;

    private const INDEX_FIELD_TYPE = 'date';
    
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
            'DateOptions' => [
                // 'DefaultValue' => '',
                'SearchEnabled' => $this->searchEnabled,
                'FacetEnabled' => $this->facetEnabled,
                'ReturnEnabled' => $this->returnEnabled,
                'SortEnabled' => $this->sortEnabled,
            ],
        ];
    }
}
