<?php

class PageResponse
{
    public array $results;
    public int $maxElements;
    public int $size;
    public int $maxPages;

    public function __construct(int $maxElements, array $results, int $size)
    {
        $this->maxElements = $maxElements;
        $this->results = $results;
        $this->size = $size;
        $this->maxPages = ceil($maxElements / 5);
    }
}
