<?php

namespace App\Shop\Products\Repositories\Interfaces;

use App\Interfaces\BaseRepositoryInterface;
use App\Shop\Products\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

/**
 * Interface ProductRepositoryInterface
 * @package App\Shop\Products\Repositories\Interfaces
 */
interface ProductRepositoryInterface
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return Collection
     */
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection;

    /**
     * @param int $id
     * @return Product
     */
    public function findProductById(int $id) : Product;

    /**
     * @return Collection
     */
    public function getCategories() : Collection;

    /**
     * @param array $slug
     * @return Product
     */
    public function findProductBySlug(array $slug) : Product;

    /**
     * @param string $text
     * @return Collection
     */
    public function searchProduct(string $text) : Collection;

    /**
     * @return Collection
     */
    public function findProductImages() : Collection;

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function saveCoverImage(UploadedFile $file) : string;

    /**
     * @param Collection $collection
     * @return mixed
     */
    public function saveProductImages(Collection $collection);
}
