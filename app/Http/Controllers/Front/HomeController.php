<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Categories\Category;
use App\Shop\Products\Repositories\ProductRepository;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    private $productRepo;

    /**
     * HomeController constructor.
     *
     * @param Category $category
     */
    public function __construct(Category $category, ProductRepository $productRepo)
    {
        $this->category = $category;
        $this->productRepo = $productRepo;

    }

    /**
     * @return View
     */
    public function index() {

        $categories = $this->category->with(['images', 'subCategories'])->parent()->get();

//        foreach($categories as $category){
//            dump($category->name);
//            foreach($category->subCategories as $subCategory){
//                dump($subCategory->name);
//            }
//        }
//        die();


        $products = $this->productRepo->getAll();

//        dd($categories->subCategories);
            return view('front.home.index', [
                'products' => $products,
                'categories' => $categories
            ]);
    }
}
