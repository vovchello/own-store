<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Categories\Repository\CategoryRepository;
use App\Shop\Products\Product;
use App\Shop\Products\Repositories\ProductRepository;
use App\Shop\Products\Transformations\ProductTransformable;

class ProductController extends Controller
{
    use ProductTransformable;

    /**
     * @var ProductRepository
     */
    private $productRepo;

    private $categoryRepo;

    /**
     * ProductController constructor.
     * @param ProductRepository $productRepo
     */
    public function __construct(ProductRepository $productRepo, CategoryRepository $categoryRepository)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepository;
    }


    public function show($slug)
    {
        $product = $this->productRepo->findProductBySlug($slug);

        $category = $this->categoryRepo->getParentCategories();

        $categories = $this->categoryRepo->findCategoryBySlug($slug);

        return view('front.products.product',[
            'product' => $product,
            'categories' => $categories,
            'category' => $category
        ]);
    }
}
