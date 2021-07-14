<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Schema\Tests;

use Kacarroll\CloudSearch\Schema\Type\Text;
use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
    public function testText()
    {
        $result = (new Text('foo'))->toArray();

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

        $this->assertEquals($expected, $result);
    }

    public function testTextWithOptionsEnabled()
    {
        $result = (new Text('foo'))
            ->highlightEnabled()
            ->returnEnabled()
            ->sortEnabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'text',
            'TextOptions' => [
                'AnalysisScheme' => '_ja_default_',
                'DefaultValue' => '',
                'HighlightEnabled' => true,
                'ReturnEnabled' => true,
                'SortEnabled' => true,
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testTextWithOptionsDisabled()
    {
        $result = (new Text('foo'))
            ->highlightDisabled()
            ->returnDisabled()
            ->sortDisabled()
            ->toArray();

        $expected = [
            'IndexFieldName' => 'foo',
            'IndexFieldType' => 'text',
            'TextOptions' => [
                'AnalysisScheme' => '_ja_default_',
                'DefaultValue' => '',
                'HighlightEnabled' => false,
                'ReturnEnabled' => false,
                'SortEnabled' => false,
            ],
        ];

        $this->assertEquals($expected, $result);
    }
}
