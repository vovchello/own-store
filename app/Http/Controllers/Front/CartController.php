<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Cart\CartRepository\CartRepository;
use App\Shop\Categories\Category;
use App\Shop\Products\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    private $cartRepository;

    /**
     * CartController constructor.
     * @param $cartRepo
     */

    private $requiest;
    public function __construct(CartRepository $cartRepository, Request $requiest)
    {
        $this->cartRepository = $cartRepository;
        $this->requiest = $requiest;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartRepository = $this->cartRepository;
        $categories = $cartRepository->getCategories();
        $cartItems = $cartRepository->getProducts();

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
        $this->cartRepository->addToCart($request);
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
        $cartRepository = $this->cartRepository;

        $cartRepository->updateQuantity($request,$id);

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
        $this->cartRepository->deleteProduct($id);
        return redirect()->route('cart.index')
            ->with('message', 'Remove product from cart successful');
    }
}
