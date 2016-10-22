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
use App\Models\CardRel;

class CardRelRepository extends BaseRepository
{

    protected $tag;

    protected $comment;

    public function __construct(CardRel $post)
    {
        $this->model = $post;
        //$this->tag = $tag;
        //$this->comment = $comment;
    }

    protected function queryActiveCardsForUser()
    {
        return $this->model
            ->query()
            ->where('user_id','=', 2);
        //->with('user')
        //->latest();
    }

    public function getActiveCardsForUser()
    {
        return $this->queryActiveCardsForUser();
    }


}