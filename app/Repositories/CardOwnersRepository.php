<?php
/**
 * Created by PhpStorm.
 * User: oleh
 * Date: 22.10.16
 * Time: 13:36
 */

namespace App\Repositories;

use App\Models\Post;
use App\Models\Bl;
use App\Models\Tag;
use App\Models\Comment;

class CardOwnersRepository extends BaseRepository
{

    protected $tag;

    protected $comment;

    public function __construct(CardOwnersRepository $post)
    {
        $this->model = $post;
        //$this->tag = $tag;
        //$this->comment = $comment;
    }

    protected function queryActiveCardsForUser()
    {
        return $this->model
            ->select('id', 'card_num', 'user_id')
            ->where('user_id', 2);
        //->with('user')
        //->latest();
    }

    public function getActiveCardsForUser()
    {
        return $this->queryActiveCardsForUser();
    }

    protected function queryActiveWithUserOrderByDate($d)
    {
        return $this->model
            ->select('id')
            ->where('user_id', $d);
        //->with('user')
        //->latest();
    }

    public function getActiveWithUserOrderByDate($n, $d)
    {
        return $this->queryActiveWithUserOrderByDate($d)->paginate($n);
    }

}