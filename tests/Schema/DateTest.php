<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Schema\Tests;

use Kacarroll\CloudSearch\Schema\Type\Date;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    public function testDate()
    {
        $result = (new Date('foo'))->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'date',
            'DateOptions' => [
                // 'DefaultValue' => '1970-01-01T00:00:00Z',
                'SearchEnabled' => true,
                'FacetEnabled' => false,
                'ReturnEnabled' => true,
                'SortEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testDateWithOptionsEnabled()
    {
        $result = (new Date('foo'))
            ->searchEnabled()
            ->facetEnabled()
            ->returnEnabled()
            ->sortEnabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'date',
            'DateOptions' => [
                // 'DefaultValue' => '1970-01-01T00:00:00Z',
                'SearchEnabled' => true,
                'FacetEnabled' => true,
                'ReturnEnabled' => true,
                'SortEnabled' => true,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testDateWithOptionsDisbled()
    {
        $result = (new Date('foo'))
            ->searchDisabled()
            ->facetDisabled()
            ->returnDisabled()
            ->sortDisabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'date',
            'DateOptions' => [
                // 'DefaultValue' => '1970-01-01T00:00:00Z',
                'SearchEnabled' => false,
                'FacetEnabled' => false,
                'ReturnEnabled' => false,
                'SortEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result);
    }
}
