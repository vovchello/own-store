<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 02.11.18
 * Time: 14:26
 */

namespace App\Shop\Services\Cashier;


use App\User;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;

class CashierServise
{
    private $requiest;

    private $user;

    private $cashier;

    /**
     * CashierServise constructor.
     * @param $requiest
     */
    public function __construct(Request $requiest, User $user, Cashier $cashier)
    {
        $this->requiest = $requiest;
        $this->user = $user;
        $this->cashier = $cashier;
    }


    public function getAllPlans()
    {
        return $this->user->subscriptions()->get();
    }
}