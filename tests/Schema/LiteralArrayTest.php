<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Schema\Tests;

use Kacarroll\CloudSearch\Schema\Type\LiteralArray;
use PHPUnit\Framework\TestCase;

class LiteralArrayTest extends TestCase
{
    public function testLiteralArray()
    {
        $result = (new LiteralArray('foo'))->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'literal-array',
            'LiteralArrayOptions' => [
                // 'DefaultValue' => '',
                'SearchEnabled' => true,
                'FacetEnabled' => false,
                'ReturnEnabled' => true,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testLiteralArrayWithOptionsEnabled()
    {
        $result = (new LiteralArray('foo'))
            ->searchEnabled()
            ->facetEnabled()
            ->returnEnabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'literal-array',
            'LiteralArrayOptions' => [
                // 'DefaultValue' => '',
                'SearchEnabled' => true,
                'FacetEnabled' => true,
                'ReturnEnabled' => true,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testLiteralArrayWithOptionsDisabled()
    {
        $result = (new LiteralArray('foo'))
            ->searchDisabled()
            ->facetDisabled()
            ->returnDisabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'literal-array',
            'LiteralArrayOptions' => [
                // 'DefaultValue' => '',
                'SearchEnabled' => false,
                'FacetEnabled' => false,
                'ReturnEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result);
    }
}
