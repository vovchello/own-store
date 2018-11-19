<?php

namespace App\Services\Searcher;

use App\Services\Searcher\Contracts\SearcherInterface;
use App\Shop\Products\Repositories\ProductRepository;

/**
 * Class ProductSearcher
 * @package App\Services\Searcher
 */
class ProductSearcher implements SearcherInterface
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * ProductSearcher constructor.
     * @param $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    /**
     * @param string $param
     */
    public function search(string $param)
    {
        return $this->searchProductByName($param);
    }

    /**
     *
     */
    private function searchProductByName(string $param)
    {
        $param = lcfirst($param);
//        dd($this->productRepository->getAll());
//        dd($param);
        dd($this->productRepository->getAll()->where('slug','like',$param));
//        return $this->productRepository->getAll()->where('name','like,','%'.$param.'%')->get();
    }
}