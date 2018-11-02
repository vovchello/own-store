<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 23.10.18
 * Time: 13:49
 */

namespace App\Shop\Services;


class CollectionService
{
    public function getCollection($value)
    {
        return collect($value);
    }

}