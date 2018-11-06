<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Categories\Category;
use App\Shop\Categories\Repository\CategoryRepository;
use App\Shop\Comments\Repository\CommentRepository;
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

    private $commentRepo;

    /**
     * ProductController constructor.
     * @param ProductRepository $productRepo
     */
    public function __construct(ProductRepository $productRepo, CategoryRepository $categoryRepository,Category $category,CommentRepository $commentRepo)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepository;
        $this->category = $category;
        $this->commentRepo = $commentRepo;
    }


    public function show($id)
    {
        $product = $this->productRepo->findProductById($id);

        $category = $this->categoryRepo->findCategoryId($id);

        $categories = $this->category->with(['images', 'subCategories'])->parent()->get();

        $comments = $this->commentRepo->getParentComments();
//        dd($comments);

        return view('front.products.product',[
            'product' => $product,
            'categories' => $categories,
            'category' => $category,
            'comments' => $comments
        ]);
    }
}
