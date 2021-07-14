<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Schema\Tests;

use Kacarroll\CloudSearch\Schema\Builder;
use PHPUnit\Framework\TestCase;

class BuilderTest extends TestCase
{
    public function testText()
    {
        $builder = new Builder;
        $builder->text('foo');
        $result = $builder->build();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'text',
            'TextOptions' => [
                'AnalysisScheme' => '_ja_default_',
                'DefaultValue' => '',
                'HighlightEnabled' => false,
                'ReturnEnabled' => true,
                'SortEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result[0]);
    }

    public function testTextArray()
    {
        $builder = new Builder;
        $builder->textArray('foo');
        $result = $builder->build();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'text-array',
            'TextArrayOptions' => [
                'AnalysisScheme' => '_ja_default_',
                'DefaultValue' => '',
                'HighlightEnabled' => false,
                'ReturnEnabled' => true,
            ],
        ];

        $this->assertEquals($expected, $result[0]);
    }

    public function testLiteral()
    {
        $builder = new Builder;
        $builder->literal('foo');
        $result = $builder->build();

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

        $this->assertEquals($expected, $result[0]);
    }

    public function testLiteralArray()
    {
        $builder = new Builder;
        $builder->literalArray('foo');
        $result = $builder->build();

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

        $this->assertEquals($expected, $result[0]);
    }

    public function testInt()
    {
        $builder = new Builder;
        $builder->int('foo');
        $result = $builder->build();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'int',
            'IntOptions' => [
                'DefaultValue' => 0,
                'SearchEnabled' => true,
                'FacetEnabled' => false,
                'ReturnEnabled' => true,
                'SortEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result[0]);
    }

    public function testIntArray()
    {
        $builder = new Builder;
        $builder->intArray('foo');
        $result = $builder->build();

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

        $this->assertEquals($expected, $result[0]);
    }

    public function testDate()
    {
        $builder = new Builder;
        $builder->date('foo');
        $result = $builder->build();

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

        $this->assertEquals($expected, $result[0]);
    }

    public function testDateArray()
    {
        $builder = new Builder;
        $builder->dateArray('foo');
        $result = $builder->build();

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

        $this->assertEquals($expected, $result[0]);
    }

    public function testDouble()
    {
        $builder = new Builder;
        $builder->double('foo');
        $result = $builder->build();

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

        $this->assertEquals($expected, $result[0]);
    }

    public function testDoubleArray()
    {
        $builder = new Builder;
        $builder->doubleArray('foo');
        $result = $builder->build();

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

        $this->assertEquals($expected, $result[0]);
    }

    public function testLatlon()
    {
        $builder = new Builder;
        $builder->latlon('foo');
        $result = $builder->build();

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

        $this->assertEquals($expected, $result[0]);
    }
}
