<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 20.10.18
 * Time: 15:59
 */

namespace App\Shop\Cart\CartRepository;


use App\Shop\Categories\Category;
use App\Shop\Categories\Repository\CategoryRepository;
use App\Shop\Products\Repositories\ProductRepository;
use App\Shop\Services\SessionService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Class CartRepository
 * @package App\Shop\Cart\CartRepository
 */
class CartRepository implements CartInterface
{

    /**
     * @var Request
     */

    private $productRepo;

    /**
     * @var
     */
    private $categoryRepo;

    /**
     * @var SessionService
     */
    private $session;

    /**
     * CartRepository constructor.
     * @param Category $category
     * @param Request $productRepo
     * @param $categoryRepo
     * @param SessionService $session
     */
    public function __construct(ProductRepository $productRepo, SessionService $session, CategoryRepository $categoryRepo)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
        $this->session = $session;
    }


    /**
     * CartController constructor.
     * @param $categories
     * @param $products
     */




    /**
     * Returns category collection for navbar
     *
     * @return Category
     */
    public function getCategories()
    {
       return $this->categoryRepo->getParentCategories();
    }


    /**
     * Returns collection of products from the session
     *
     * @return \Illuminate\Support\Collection
     */
    public function getProducts() :Collection
    {
        $productRepo = $this->productRepo;

        $session = $this->session;

        $products=collect();

        if (($session->has('cart') )and ( $session->isNotNull('cart')))
        {
            $cart = $session->getAll('cart');

            foreach ($cart as $value)
            {
                $productCollection = $productRepo->findProductById($value['product_id']);

                $images = $productCollection->images()->get()->first();

                $cover = $images['src'];

                $product = collect
                ([
                    'product' => $productCollection,
                    'quantity' => $value['count'],
                    'cover' => $cover,
                ]);

                $products->push($product->all());
            }

            return $products->sort();
        }

        return $products->sort();
    }


    /**
     * Collection of products chosen by user is pushing into the ssession. Also counts products
     *
     * @param $request
     */
    public function addToCart($requiest) :void
    {
        $session = $this->session;

        $product = $requiest->input('product');

        if(! ($session->has('cart')))
        {
            $cartCollection = collect([['product_id'=> $product,'count' => 1]]);
            $session->put('cart',$cartCollection);
            return;
        }

        $cartCollection = $session->getById('cart');

        $param = $cartCollection->where('product_id',$product)->first();

        $cartCollection = $cartCollection->where('product_id','<>',$product);

        if(!(is_null($param)))
        {
            $param['count']=$this->checkQuantaty($param['product_id'],$param['count']++);
            $cartCollection->push(['product_id'=> $product,'count' => $param['count']]);
            $session->put('cart',$cartCollection);
            return;
        }

        $cartCollection->push(['product_id'=> $product,'count' => 1]);

        $session->put('cart',$cartCollection);



    }

    /**
     * Updating the product quantity in the cart
     *
     * @param $requiest
     * @param $id
     */
    public function updateQuantity($requiest, $id) :void
    {
        $cart = $this->session->getById('cart')->where('product_id','<>',$id);

        $quantity = $requiest->input('quantity');

        $cart->push(['product_id'=> $id,'count' => $this->checkQuantaty($id,$quantity)]);

        $this->session->put('cart',$cart);


    }

    /**
     * Delete products from the cart by id
     *
     * @param $id
     */
    public function deleteProduct($id):void
    {
        $cart = $this->session->getById('cart')->where('product_id','<>',$id);

        $this->session->put('cart',$cart);


    }

    /**
     * Check quantity of the product
     *
     * @param $id
     * @param $inputQuantity
     * @return mixed
     */
    private function checkQuantaty($id, $inputQuantity)
    {
        $productRepo = $this->productRepo;

        $quantity = $productRepo->findProductById($id)->quantity;

        if($inputQuantity > $quantity)
        {
            return $quantity;
        }

        return $inputQuantity;
    }
}