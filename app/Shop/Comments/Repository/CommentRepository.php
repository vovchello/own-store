<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 03.11.18
 * Time: 9:53
 */

namespace App\Shop\Comments\Repository;


use App\Shop\Comments\Comment;
use App\User;

class CommentRepository
{

    private $comment;

    /**
     * CommentRepository constructor.
     * @param $comment
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function getAll()
    {
        return $this->comment->all();
    }

    public function saveNewComment($request):void
    {
        $comment = $this->comment;

        $comment->description = $request->text;


        $comment->user_id = User::where('email',$request->email)->first()->id;

        $comment->product_id = $request->product;

        $comment->save();
    }

}