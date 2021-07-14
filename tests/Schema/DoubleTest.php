<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Schema\Tests;

use Kacarroll\CloudSearch\Schema\Type\Double;
use PHPUnit\Framework\TestCase;

class DoubleTest extends TestCase
{
    public function testDouble()
    {
        $result = (new Double('foo'))->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'double',
            'DoubleOptions' => [
                'DefaultValue' => 0.0,
                'SearchEnabled' => true,
                'FacetEnabled' => false,
                'ReturnEnabled' => true,
                'SortEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testDoubleWithOptionsEnabled()
    {
        $result = (new Double('foo'))
            ->searchEnabled()
            ->facetEnabled()
            ->returnEnabled()
            ->sortEnabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'double',
            'DoubleOptions' => [
                'DefaultValue' => 0.0,
                'SearchEnabled' => true,
                'FacetEnabled' => true,
                'ReturnEnabled' => true,
                'SortEnabled' => true,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testDoubleWithOptionsDisabled()
    {
        $result = (new Double('foo'))
            ->searchDisabled()
            ->facetDisabled()
            ->returnDisabled()
            ->sortDisabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'double',
            'DoubleOptions' => [
                'DefaultValue' => 0.0,
                'SearchEnabled' => false,
                'FacetEnabled' => false,
                'ReturnEnabled' => false,
                'SortEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result);
    }
}
