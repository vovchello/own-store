<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 03.11.18
 * Time: 12:34
 */

namespace App\Shop\User\Repository;


use App\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    private $user;

    /**
     * UserRepository constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function saveUnsignedUser($name,$email):void
    {
        $user = $this->user;
        $user->name = $name;
        $user->email = $email;
        $user->password = '';

        $user->save();
    }

    public function findUserByEmail($email)
    {
        return $this->user->where('email',$email)->first();
    }

    public function checkauth()
    {
        return Auth::user();
    }

    public function getAuthUserEmail()
    {
        return $this->user->where('id',$this->getAuthId())->first()->email;
    }

    public function getAuthUserName()
    {
        return $this->user->where('id',$this->getAuthId())->first()->name;
    }

    protected function getAuthId()
    {
        return Auth::id();
    }



}