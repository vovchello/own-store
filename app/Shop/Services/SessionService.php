<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 21.10.18
 * Time: 22:36
 */

namespace App\Shop\Services;


use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Class SessionService
 * @package App\Shop\Services
 */
class SessionService
{

    /**
     * @var Request
     */
    private $request;

    /**
     * SessionService constructor.
     * @param $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $id
     */
    public function pull($id) : void
    {
        $this->request->session()->pull("$id");
    }

    /**
     * @param $id
     * @param $data
     */
    public function put($id, $data) : void
    {
        $this->request->session()->put("$id",$data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getAll($id)
    {
        return $this->request->session()->get($id)->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public  function getById($id)
    {
        return $this->request->session()->get($id);
    }

    /**
     * @param $id
     * @return bool
     */
    public function has($id)
    {

        return $this->request->session()->has($id);
    }

    /**
     * @param $id
     * @return bool
     */
    public function isNotNull($id)
    {
        return ! is_null($this->request->session()->get($id));
    }



}