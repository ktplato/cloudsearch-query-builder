<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Schema\Tests;

use Kacarroll\CloudSearch\Schema\Type\Integer;
use PHPUnit\Framework\TestCase;

class IntegerTest extends TestCase
{
    public function testInt()
    {
        $result = (new Integer('foo'))->toArray();

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

        $this->assertEquals($expected, $result);
    }

    public function testIntWithOptionsEnabled()
    {
        $result = (new Integer('foo'))
            ->searchEnabled()
            ->facetEnabled()
            ->returnEnabled()
            ->sortEnabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'int',
            'IntOptions' => [
                'DefaultValue' => 0,
                'SearchEnabled' => true,
                'FacetEnabled' => true,
                'ReturnEnabled' => true,
                'SortEnabled' => true,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testIntWithOptionsDisabled()
    {
        $result = (new Integer('foo'))
            ->searchDisabled()
            ->facetDisabled()
            ->returnDisabled()
            ->sortDisabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'int',
            'IntOptions' => [
                'DefaultValue' => 0,
                'SearchEnabled' => false,
                'FacetEnabled' => false,
                'ReturnEnabled' => false,
                'SortEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result);
    }
}
