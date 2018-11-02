<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Categories\Category;
use App\Shop\Categories\Repository\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    private $categoryRepo;

    /**
     * CategoryController constructor.
     *
     * @param Category $category
     */
    public function __construct(Category $category,CategoryRepository $categoryRepo)
    {
        $this->category = $category;
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * Find the category via the slug
     *
     * @param string $slug
     *
     * @return Category
     */
    public function getCategory(string $slug)
    {

        $categories = $this->categoryRepo->getAll();


        $parentCategories = $categories->where('parent_id',null);

//       dd($parentCategories);

        $category = $categories->where('slug', $slug)->first();

//        dd($category->images[0]->src);

        return view('front.categories.category', [
            'category' => $category,
            'categories' => $parentCategories
        ]);
    }
}
