<?php

namespace App\Services\Searcher\Contracts;

interface SearcherInterface
{
    public function search(string $param);
}