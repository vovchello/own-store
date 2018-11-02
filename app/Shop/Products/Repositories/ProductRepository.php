<?php

namespace App\Shop\Products\Repositories;

use App\Repositories\BaseRepository;
use App\Shop\Products\Exceptions\ProductCreateErrorException;
use App\Shop\Products\Exceptions\ProductUpdateErrorException;
//use App\Shop\Tools\UploadableTrait;
use App\Shop\Images\ProductImage;
use App\Shop\Products\Exceptions\ProductNotFoundException;
use App\Shop\Products\Product;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\Products\Transformations\ProductTransformable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductRepository //implements ProductRepositoryInterface
{
    private $product;

    /**
     * ProductRepository constructor.
     * @param $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    public function getAll()
    {
        return $this->product->all();
    }

    public function findProductById(int $id) : Product
    {
        return $this->product->where('id',$id)->first();
    }

    /**
     * @return Product|\Illuminate\Database\Eloquent\Builder|Collection
     */
    public function getCategories():collection
    {
        return $this->product->with('categories');
    }

    public function findProductBySlug($slug)
    {
        return $this->product->where('slug',$slug)->get();
    }

    public function findProductImages() : Collection
    {
        return $this->product->with('images')->get();
    }

}
