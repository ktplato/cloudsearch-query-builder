<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Schema\Tests;

use Kacarroll\CloudSearch\Schema\Type\DateArray;
use PHPUnit\Framework\TestCase;

class DateArrayTest extends TestCase
{
    public function testDateArray()
    {
        $result = (new DateArray('foo'))->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'date-array',
            'DateArrayOptions' => [
                // 'DefaultValue' => '',
                'SearchEnabled' => true,
                'FacetEnabled' => false,
                'ReturnEnabled' => true,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testDateArrayWithOptionsEnabled()
    {
        $result = (new DateArray('foo'))
            ->searchEnabled()
            ->facetEnabled()
            ->returnEnabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'date-array',
            'DateArrayOptions' => [
                // 'DefaultValue' => '',
                'SearchEnabled' => true,
                'FacetEnabled' => true,
                'ReturnEnabled' => true,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testDateArrayWithOptionsDisbled()
    {
        $result = (new DateArray('foo'))
            ->searchDisabled()
            ->facetDisabled()
            ->returnDisabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'date-array',
            'DateArrayOptions' => [
                // 'DefaultValue' => '',
                'SearchEnabled' => false,
                'FacetEnabled' => false,
                'ReturnEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result);
    }
}
