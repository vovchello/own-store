<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 08.11.18
 * Time: 11:45
 */

namespace App\Http\Controllers\Front;


use App\Services\Searcher\ProductSearcher;
use App\Shop\Categories\Category;
use Illuminate\Http\Request;

class SearchController
{
    private $productSearcher;

    private $category;

    /**
     * SearchController constructor.
     * @param $productSearcher
     */
    public function __construct(ProductSearcher $productSearcher, Category $category)
    {
        $this->productSearcher = $productSearcher;
        $this->category = $category;
    }


    public function searchProductByName(Request $request)
    {
        $param = $request->search;
        $search = $this->productSearcher->search($param);
        $categories = $this->category->with(['images', 'subCategories'])->parent()->get();
        return view('front.search.search', [
            'product' => $search,
            'categories' => $categories
        ]);
    }
}