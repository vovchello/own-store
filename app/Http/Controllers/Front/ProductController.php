<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Categories\Category;
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

    private $category;

    /**
     * ProductController constructor.
     * @param ProductRepository $productRepo
     */
    public function __construct(ProductRepository $productRepo, CategoryRepository $categoryRepository,Category $category)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepository;
        $this->category = $category;
    }


    public function show($id)
    {
        $product = $this->productRepo->findProductById($id);
//        dd($product);
        $category = $this->categoryRepo->findCategoryId($id);

//        $categories = $this->categoryRepo->findCategoryId($id);

        $categories = $this->category->with(['images', 'subCategories'])->parent()->get();
//        dd($category);

        return view('front.products.product',[
            'product' => $product,
            'categories' => $categories,
            'category' => $category
        ]);
    }
}
