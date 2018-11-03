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
use App\Shop\Services\Cashier\CashierServise;
use App\User;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;

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

    private $cashierServise;

    /**
     * HomeController constructor.
     *
     * @param Category $category
     */
    public function __construct(Category $category, ProductRepository $productRepo, CashierServise $cashierServise)
    {
        $this->category = $category;
        $this->productRepo = $productRepo;
        $this->cashierServise = $cashierServise;

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->category->with(['images', 'subCategories'])->parent()->get();

        $products = $this->productRepo->getAll();

        $cashierServise = $this->cashierServise;

//        dd($cashierServise->getAllPlans());

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
        $user = User::where('email',$request->stripeEmail)->first();
        $stripeToken = $request->stripeToken;
        $user->newSubscription('main','plan_DtlTwzjf3f8Hbj')->create($stripeToken);
        $user->upcomingInvoice();
//        dd($user);
        return redirect('/');

    }
}