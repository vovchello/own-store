<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 27.10.18
 * Time: 18:03
 */

namespace App\Http\ViewComposers;


use App\Shop\Categories\Repository\CategoryRepository;

/**
 * Class HeaderComposer
 * @package App\Http\ViewComposers
 */
class HeaderComposer
{
    /**
     * @var
     */
    private $categoryRepo;

    /**
     * HeaderComposer constructor.
     * @param $categoryRepo
     */
    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function composer(View $view)
    {
        $view->with('categories',$this->categoryRepo->getAll());
    }

}