<?php

namespace App\Http\Middleware;

use App\Shop\Services\SessionService;
use Closure;

class EmptyCart
{
    private $sessionRepo;

    /**
     * EmptyCart constructor.
     * @param $session
     */
    public function __construct(SessionService $sessionRepo)
    {
        $this->sessionRepo = $sessionRepo;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $sessionRepo = $this->sessionRepo;
        if ($sessionRepo->has('cart'))
        {
            $session = $this->sessionRepo->getAll('cart');
//            dd($session);
            if (! empty($session))
            {
                return $next($request);
            }
        }
        if (! is_null($request->input('product')))
        {
            return $next($request);
        }

        return  redirect('/')->with('error','Cart is empty');
    }
}
