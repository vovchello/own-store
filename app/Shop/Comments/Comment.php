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

/**
 * Class Comment
 * @package App\Shop\Comments
 */
class Comment extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'description',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subComment()
    {
        return $this->hasMany(Comment::class,'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return mixed
     */
    public function parent()
    {
        return $this->where('parent_id',null);
    }

    public function subCommentByParentId($id)
    {

//            dd($this->where('parent_id',$id));
            return $this->where('parent_id',$id);

    }

}