<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 03.11.18
 * Time: 9:51
 */

namespace App\Shop\Comments;


use App\Shop\Products\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'description',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}