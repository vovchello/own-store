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
use App\Shop\Products\Product;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use Monolog\Formatter\ElasticaFormatter;
use Monolog\Handler\ElasticSearchHandler;

class SearchController
{
    private $product;

    private $category;

    private  $elasticSearch;

    private $client;

    /**
     * SearchController constructor.
     * @param $productSearcher
     */
    public function __construct(Product $product)
    {
        $this->client = ClientBuilder::create()->build();

        $this->product = $product;
    }


    public function searchProductByName(Request $request)
    {
//        $param = $request->search;
//        $search = $this->productSearcher->search($param);
//        $categories = $this->category->with(['images', 'subCategories'])->parent()->get();
//        return view('front.search.search', [
//            'product' => $search,
//            'categories' => $categories
//        ]);
        $params = [
            'index' => 'store',
            'type' => 'post',
            'id' => '1',
            'body' => [
                'testField' => 'abc'
            ]
        ];
        dd($this->client->index($params));
    }
}