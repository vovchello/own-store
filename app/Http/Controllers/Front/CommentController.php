<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Categories\Category;
use App\Shop\Comments\Comment;
use App\Shop\Comments\Repository\CommentRepository;
use App\Shop\Comments\Requests\AddCommentRequest;
use App\Shop\Products\Repositories\ProductRepository;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    private $commentRepo;

    private $category;

    /**
     * CommentController constructor.
     * @param $comment
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepo = $commentRepository;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCommentRequest $request)
    {
        $this->commentRepo->saveNewComment($request);
        return redirect(route('front.get.product', $request->product_id));

    }
}



