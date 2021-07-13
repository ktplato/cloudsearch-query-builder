<?php
declare(strict_types = 1);

namespace Kacarroll\CloudSearchQuery\Tests;

use Kacarroll\CloudSearchQuery\Builder;
use PHPUnit\Framework\TestCase;

class QueryBuilderTest extends TestCase
{
    public function testStart()
    {
        $parameters1 = (new Builder)->build();

        $this->assertSame(0, $parameters1['start']);

        $parameters2 = (new Builder)
            ->page(2)->size(50)->build();
        
        $this->assertSame(50, $parameters2['start']);
    }

    public function testSort()
    {
        $parameters1 = (new Builder)->build();

        $this->assertSame('_score desc', $parameters1['sort']);

        $parameters2 = (new Builder)
            ->sort("foo", "asc")->build();
        
        $this->assertSame('foo asc', $parameters2['sort']);
    }

    public function testSortIsOnlyAllowedAscOrDesc()
    {
        $this->expectException(\InvalidArgumentException::class);
        (new Builder)->sort("foo", "invalid");
    }
    
    public function testTermsQuery()
    {
        $parameters = (new Builder)
            ->terms(['one'], 'foo')
            ->build();

        $this->assertSame("(and (or (term field=foo 'one')))", $parameters['query']);
    }

    public function testTermsQueryHasManyValues()
    {
        $parameters = (new Builder)
            ->terms(['one', 'two'], 'foo')
            ->build();

        $this->assertSame("(and (or (term field=foo 'one') (term field=foo 'two')))", $parameters['query']);
    }

    public function testTermsFieldIsOptional()
    {
        $parameters = (new Builder)
            ->terms(['one', 'two'], 'foo')
            ->terms(['three', 'four'])
            ->build();

        $expected = "(and (or (term field=foo 'one') (term field=foo 'two')) (or (term 'three') (term 'four')))";

        $this->assertSame($expected, $parameters['query']);
    }

    public function testLiteralsQuery()
    {
        $parameters = (new Builder)
            ->literals(['one'], 'foo')
            ->build();

        $this->assertSame("(and (or foo:'one'))", $parameters['query']);
    }

    public function testLiteralsQueryHasManyValues()
    {
        $parameters = (new Builder)
            ->literals(['one', 'two'], 'foo')
            ->build();

        $this->assertSame("(and (or foo:'one' foo:'two'))", $parameters['query']);
    }

    public function testLiteralsQueryAllowedToHasIntegerValues()
    {
        $parameters = (new Builder)
            ->literals([10, 20], 'foo')
            ->build();

        $this->assertSame("(and (or foo:10 foo:20))", $parameters['query']);
    }

    public function testTermsContainsEmptyValues()
    {
        $parameters = (new Builder)
            ->terms(['one', 'two'], 'foo')
            ->terms([], 'bar')
            ->build();

        $this->assertSame("(and (or (term field=foo 'one') (term field=foo 'two')))", $parameters['query']);
    }

    public function testLiteralsContainsEmptyValues()
    {
        $parameters = (new Builder)
            ->literals(['one', 'two'], 'foo')
            ->literals([], 'bar')
            ->build();

        $this->assertSame("(and (or foo:'one' foo:'two'))", $parameters['query']);
    }

    public function testBoolean()
    {
        $parameters = (new Builder)
            ->boolean(true, 'foo')
            ->boolean(false, 'bar')
            ->build();

        $this->assertSame("(and (or foo:1) (or bar:0))", $parameters['query']);
    }

    public function testMixedQuery()
    {
        $parameters = (new Builder)
            ->terms(['one', 'two'], 'foo')
            ->literals(['one'], 'bar')
            ->build();

        $this->assertSame("(and (or (term field=foo 'one') (term field=foo 'two')) (or bar:'one'))", $parameters['query']);
    }

    public function testFacet()
    {
        $parameters = (new Builder)
            ->facet(['one', 'two'], 'foo')
            ->facet(['three', 'four'], 'bar')
            ->build();
        
        $this->assertSame('{"foo":{"buckets":["one","two"]},"bar":{"buckets":["three","four"]}}', $parameters['facet']);
    }

    public function testTermsOperatorCanBeChanged()
    {
        $parameters = (new Builder)
            ->terms(['one', 'two'], 'foo', 'and')
            ->terms(['three'])
            ->build();

        $this->assertSame("(and (and (term field=foo 'one') (term field=foo 'two')) (or (term 'three')))", $parameters['query']);
    }

    public function testLiteralOperatorCanBeChanged()
    {
        $parameters = (new Builder)
            ->literals(['one', 'two'], 'foo', 'and')
            ->literals(['three'], 'bar')
            ->build();

        $this->assertSame("(and (and foo:'one' foo:'two') (or bar:'three'))", $parameters['query']);
    }
}
