<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 03.11.18
 * Time: 12:11
 */

namespace App\Shop\Comments\Requests;


use App\Shop\Base\BaseFormRequest;

class AddCommentRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required'],
            'text' => ['required'],
            'product_id' =>['nullable'],
            'parent_id' => ['nullable']
        ];
    }
}