<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 23.10.18
 * Time: 13:36
 */

namespace App\Shop\Cart\CartRepository;

/**
 * Interface CartInterface
 * @package App\Shop\Cart\CartRepository
 */
interface  CartInterface
{
    /**
     * Adding products into session
     *
     * @param $requiest
     * @return mixed
     */
    public function addToCart($requiest);

    /**
     * get products from the session to the views
     *
     * @return mixed
     */
    public function getProducts();

    /**
     * Delete products from the cart by id
     *
     * @param $id
     * @return mixed
     */
    public function deleteProduct($id);

    /**
     * Updating the product quantity in the cart
     *
     * @param $requiest
     * @param $id
     * @return mixed
     */
    public function updateQuantity($requiest, $id);

    /**
     * Getting categories from the db for the nav-bar
     *
     * @return mixed
     */
    public function getCategories();



}