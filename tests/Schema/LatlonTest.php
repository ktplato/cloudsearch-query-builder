<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Schema\Tests;

use Kacarroll\CloudSearch\Schema\Type\Latlon;
use PHPUnit\Framework\TestCase;

class LatlonTest extends TestCase
{
    public function testLatlon()
    {
        $result = (new Latlon('foo'))->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'latlon',
            'LatlonOptions' => [
                'DefaultValue' => '',
                'FacetEnabled' => false,
                'SearchEnabled' => true,
                'ReturnEnabled' => true,
                'SortEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testLatlonWithOptionsEnabled()
    {
        $result = (new Latlon('foo'))
            ->searchEnabled()
            ->facetEnabled()
            ->returnEnabled()
            ->sortEnabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'latlon',
            'LatlonOptions' => [
                'DefaultValue' => '',
                'FacetEnabled' => true,
                'SearchEnabled' => true,
                'ReturnEnabled' => true,
                'SortEnabled' => true,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testLatlonWithOptionsDisabled()
    {
        $result = (new Latlon('foo'))
            ->searchDisabled()
            ->facetDisabled()
            ->returnDisabled()
            ->sortDisabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'latlon',
            'LatlonOptions' => [
                'DefaultValue' => '',
                'FacetEnabled' => false,
                'SearchEnabled' => false,
                'ReturnEnabled' => false,
                'SortEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result);
    }
}
