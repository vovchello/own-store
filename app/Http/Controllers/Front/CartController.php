<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Cart\CartRepository\CartRepository;
use App\Shop\Categories\Category;
use App\Shop\Products\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    private $cartRepo;

    /**
     * CartController constructor.
     * @param $cartRepo
     */

    private $requiest;
    public function __construct(CartRepository $cartRepo, Request $requiest)
    {
        $this->cartRepo = $cartRepo;
        $this->requiest = $requiest;
//        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartRepo = $this->cartRepo;

        $categories = $cartRepo->getCategories();

        $cartItems = $this->cartRepo->getProducts();



        return view('front.cart.cart',[
            'categories' => $categories,
            'cartItems' => $cartItems

        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->cartRepo->addToCart($request);
//        dd($request);
        return redirect()->route('cart.index')
        ->with('message', 'Add to cart successful');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $repository = $this->cartRepo;

        $repository->updateQuantity($request,$id);

        return redirect()->route('cart.index')
        ->with('message', 'cart was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cartRepo->deleteProduct($id);
        return redirect()->route('cart.index')
            ->with('message', 'Remove product from cart successful');
    }
}
