<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 03.11.18
 * Time: 9:53
 */

namespace App\Shop\Comments\Repository;


use App\Shop\Comments\Comment;
use App\Shop\Comments\Requests\AddCommentRequest;
use App\Shop\User\Repository\UserRepository;
use App\User;
use Illuminate\Support\Facades\Auth;

/**
 * Class CommentRepository
 * @package App\Shop\Comments\Repository
 */
class CommentRepository
{

    /**
     * @var Comment
     */
    private $comment;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * CommentRepository constructor.
     * @param $comment
     */
    public function __construct(Comment $comment, UserRepository $userRepository)
    {
        $this->comment = $comment;
        $this->userRepository = $userRepository;
    }

    /**
     * @return Comment[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->comment->all();
    }


    /**
     * @param AddCommentRequest $request
     */
    public function saveNewComment(AddCommentRequest $request)
    {
        $user = $this->userRepository;

        $validated = $request->validated();


        if($user->checkauth() != null)
        {
            $validated['email'] = $user->getAuthUserEmail();
            $validated['name'] = $user->getAuthUserName();
            $this->save($validated);
            return;
        }

        if ($user->findUserByEmail($validated['email'])  === null)
        {
            $this->saveUser($validated['name'],$validated['email']);
        }


        $this->save($validated);

    }



    /**
     * @param $name
     * @param $email
     */
    private function saveUser($name, $email):void
    {
        $this->userRepository->saveUnsignedUser($name,$email);
    }


    private function saveProductComment($data)
    {
        $comment = $this->comment;

        $comment->description = $data['text'];

        $comment->user_id = $this->userRepository->findUserByEmail($data['email'])->id;

        $comment->product_id = $data['product_id'];

        $comment->save();
    }

    private function saveComentComment($data)
    {
        $comment = $this->comment;

        $comment->description = $data['text'];

        $comment->user_id = $this->userRepository->findUserByEmail($data['email'])->id;

        $comment->parent_id = $data['parent_id'];

        $comment->save();
    }

    public function getParentComments()
    {
        return $this->comment->parent()->get();
    }

    /**
     * @param $data
     */
    private function save($data):void
    {

//        dd($data);

        if (isset($data['parent_id']))
        {
            $this->saveComentComment($data);
            return ;
        }

        $this->saveProductComment($data);

    }


}