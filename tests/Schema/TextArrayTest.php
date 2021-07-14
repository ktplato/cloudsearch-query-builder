<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Schema\Tests;

use Kacarroll\CloudSearch\Schema\Type\TextArray;
use PHPUnit\Framework\TestCase;

class TextArrayTest extends TestCase
{
    public function testTextArray()
    {
        $result = (new TextArray('foo'))->toArray();

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

        $this->assertEquals($expected, $result);
    }

    public function testTextArrayWithOptionsEnabled()
    {
        $result = (new TextArray('foo'))
            ->highlightEnabled()
            ->returnEnabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'text-array',
            'TextArrayOptions' => [
                'AnalysisScheme' => '_ja_default_',
                'DefaultValue' => '',
                'HighlightEnabled' => true,
                'ReturnEnabled' => true,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testTextArrayWithOptionsDisabled()
    {
        $result = (new TextArray('foo'))
            ->highlightDisabled()
            ->returnDisabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'text-array',
            'TextArrayOptions' => [
                'AnalysisScheme' => '_ja_default_',
                'DefaultValue' => '',
                'HighlightEnabled' => false,
                'ReturnEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result);
    }
}
