<?php

declare(strict_types=1);

namespace Kacarroll\CloudSearch\Query;

use Closure;

class Builder
{
    private const QUERY_PARSER = 'structured';

    protected string $operator = 'and';

    protected int $page = 1;

    protected int $size = 50;

    protected string $sort = "_score desc";

    /**
     * @var Term[]
     */
    protected array $terms = [];

    /**
     * @var Literal[]
     */
    protected array $literals = [];

    /**
     * @var array[]
     */
    protected array $facets = [];

    /**
     * @var Builder[]
     */
    protected array $subQueries = [];


    public function and(): self
    {
        $this->operator = 'and';

        return $this;
    }

    public function or(): self
    {
        $this->operator = 'or';

        return $this;
    }

    /**
     * @param string[] $values
     */
    public function terms(array $values, ?string $field = null, string $operator = 'or'): self
    {
        if (empty($values)) {
            return $this;
        }

        $this->terms[] = new Term($values, $field, $operator);

        return $this;
    }

    /**
     * @param (int|string)[] $values
     */
    public function literals(array $values, string $field, string $operator = 'or'): self
    {
        if (empty($values)) {
            return $this;
        }

        $this->literals[] = new Literal($values, $field, $operator);

        return $this;
    }
    
    public function boolean(bool $value, string $field): self
    {
        $this->literals[] = new Literal([(int) $value], $field);
        
        return $this;
    }

    public function facet(array $value, string $field): self
    {
        $this->facets[$field]["buckets"] = $value;

        return $this;
    }

    public function page(int $value): self
    {
        $this->page = $value;

        return $this;
    }

    public function size(int $value): self
    {
        $this->size = $value;

        return $this;
    }

    public function sort(string $field, string $direction): self
    {
        if (!in_array($direction, ['asc', 'desc'], true)) {
            throw new \InvalidArgumentException('Parameter "$direction" is only allowed asc or desc.');
        }

        $this->sort = "$field $direction";

        return $this;
    }

    public function subQuery(Closure $callback): self
    {
        $subQuery = new self;

        $callback($subQuery);

        $this->subQueries[] = $subQuery;

        return $this;
    }

    public function build()
    {
        $query = $this->compile();
        $start = $this->start();
        $queryParser = self::QUERY_PARSER;
        $size = $this->size;
        $sort = $this->sort;

        $parameters = compact('query', 'start', 'queryParser', 'size', 'sort');

        if (! empty($this->facets)) {
            $parameters['facet'] = $this->generateFacetQuery();
        }

        return $parameters;
    }

    protected function compile(): string
    {
        $clauses = [];

        foreach ($this->subQueries as $subQuery) {
            $clauses[] = $subQuery->compile();
        }

        foreach ($this->terms as $term) {
            $clauses[] = $term->generateClause();
        }

        foreach ($this->literals as $literal) {
            $clauses[] = $literal->generateClause();
        }

        return Util::wrap(implode(" ", $clauses), $this->operator);
    }

    protected function generateFacetQuery(): string
    {
        return json_encode($this->facets);
    }

    protected function start(): int
    {
        return ($this->page - 1) * $this->size;
    }
}
