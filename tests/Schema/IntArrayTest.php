<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Schema\Tests;

use Kacarroll\CloudSearch\Schema\Type\IntArray;
use PHPUnit\Framework\TestCase;

class IntArrayTest extends TestCase
{
    public function testIntArray()
    {
        $result = (new IntArray('foo'))->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'int-array',
            'IntArrayOptions' => [
                'DefaultValue' => 0,
                'SearchEnabled' => true,
                'FacetEnabled' => false,
                'ReturnEnabled' => true,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testIntArrayWithOptionsEnabled()
    {
        $result = (new IntArray('foo'))
            ->searchEnabled()
            ->facetEnabled()
            ->returnEnabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'int-array',
            'IntArrayOptions' => [
                'DefaultValue' => 0,
                'SearchEnabled' => true,
                'FacetEnabled' => true,
                'ReturnEnabled' => true,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testIntArrayWithOptionsDisabled()
    {
        $result = (new IntArray('foo'))
            ->searchDisabled()
            ->facetDisabled()
            ->returnDisabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'int-array',
            'IntArrayOptions' => [
                'DefaultValue' => 0,
                'SearchEnabled' => false,
                'FacetEnabled' => false,
                'ReturnEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result);
    }
}
