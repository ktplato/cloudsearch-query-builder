<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Schema\Tests;

use Kacarroll\CloudSearch\Schema\Type\DoubleArray;
use PHPUnit\Framework\TestCase;

class DoubleArrayTest extends TestCase
{
    public function testDoubleArray()
    {
        $result = (new DoubleArray('foo'))->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'double-array',
            'DoubleArrayOptions' => [
                'DefaultValue' => 0.0,
                'SearchEnabled' => true,
                'FacetEnabled' => false,
                'ReturnEnabled' => true,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testDoubleArrayWithOptionsEnabled()
    {
        $result = (new DoubleArray('foo'))
            ->searchEnabled()
            ->facetEnabled()
            ->returnEnabled()
            ->toArray();
        
        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'double-array',
            'DoubleArrayOptions' => [
                'DefaultValue' => 0.0,
                'SearchEnabled' => true,
                'FacetEnabled' => true,
                'ReturnEnabled' => true,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testDoubleArrayWithOptionsDisabled()
    {
        $result = (new DoubleArray('foo'))
            ->searchDisabled()
            ->facetDisabled()
            ->returnDisabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'double-array',
            'DoubleArrayOptions' => [
                'DefaultValue' => 0.0,
                'SearchEnabled' => false,
                'FacetEnabled' => false,
                'ReturnEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result);
    }
}
