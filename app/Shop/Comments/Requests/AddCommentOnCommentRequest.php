<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 03.11.18
 * Time: 12:11
 */

namespace App\Shop\Comments\Requests;


use App\Shop\Base\BaseFormRequest;

class AddCommentOnCommentRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => ['nullable'],
            'email' => ['nullable'],
            'text' => ['required'],
            'comment' => ['nullable']
        ];
    }
}