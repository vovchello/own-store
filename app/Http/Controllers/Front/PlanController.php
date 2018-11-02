<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 01.11.18
 * Time: 17:55
 */

namespace App\Http\Controllers\Front;


use App\Shop\Categories\Category;
use App\Shop\Products\Repositories\ProductRepository;
use App\User;
use Illuminate\Http\Request;
use Stripe\Stripe;

/**
 * Class PlanController
 * @package App\Http\Controllers\Front
 */
class PlanController
{

    /**
     * @var Category
     */
    private $category;

    /**
     * @var ProductRepository
     */
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->category->with(['images', 'subCategories'])->parent()->get();

        $products = $this->productRepo->getAll();

        return view('front.plans.plan', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * @param Request $request
     * @var $user User
     */
    public function register(Request $request)
    {
//        dd($request);
        $user = User::where('email',$request->stripeEmail)->first();
        $user->setStripeKey($user->getStripeKey());
        $stripeToken = $request->stripeToken;
//        dd($stripeToken);
        $user->newSubscription('main','plan_DtlTwzjf3f8Hbj')->create($stripeToken);


////        $user = User::where('email',$request->stripeEmail);
//            $user = User::find($request->stripeEmail);
//        $stripeToken = 'pk_test_ujRTFB6ZxsHafUxYeIrUzpFa';
//        $stripeToken = Stripe::setApiKey('sk_test_HOTBIQ2U15sFHBgnu6OtG8mM');
//
//        dd($stripeToken);
//        dd($stripeToken);

//        $user->newSubscription('main','plan_DtlTwzjf3f8Hbj')->create($stripeToken);

//            \Stripe\Stripe::setApiKey("sk_test_HOTBIQ2U15sFHBgnu6OtG8mM");

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
//            $token = $_POST['stripeToken'];
//            $charge = \Stripe\Charge::create([
//                'amount' => 999,
//                'currency' => 'usd',
//                'description' => 'Example charge',
//                'source' => $token,
//            ]);



    }
}