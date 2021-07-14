<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Schema\Tests;

use Kacarroll\CloudSearch\Schema\Type\Literal;
use PHPUnit\Framework\TestCase;

class LiteralTest extends TestCase
{
    public function testLiteral()
    {
        $result = (new Literal('foo'))->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'literal',
            'LiteralOptions' => [
                'DefaultValue' => '',
                'SearchEnabled' => true,
                'FacetEnabled' => false,
                'ReturnEnabled' => true,
                'SortEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testLiteralWithOptionsEnabled()
    {
        $result = (new Literal('foo'))
            ->searchEnabled()
            ->facetEnabled()
            ->returnEnabled()
            ->sortEnabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'literal',
            'LiteralOptions' => [
                'DefaultValue' => '',
                'SearchEnabled' => true,
                'FacetEnabled' => true,
                'ReturnEnabled' => true,
                'SortEnabled' => true,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testLiteralWithOptionsDisabled()
    {
        $result = (new Literal('foo'))
            ->searchDisabled()
            ->facetDisabled()
            ->returnDisabled()
            ->sortDisabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'literal',
            'LiteralOptions' => [
                'DefaultValue' => '',
                'SearchEnabled' => false,
                'FacetEnabled' => false,
                'ReturnEnabled' => false,
                'SortEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result);
    }
}
