<?php
/**
 * Created by PhpStorm.
 * User: oleh
 * Date: 21.10.16
 * Time: 11:37
 */

namespace App\Repositories;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Comment;

class CardManagerRepository extends BaseRepository
{
    protected $tag;

    protected $comment;

    public function __construct(Post $post, Tag $tag, Comment $comment)
    {
        $this->model = $post;
        //$this->tag = $tag;
        //$this->comment = $comment;
    }

    protected function savePost($post, $inputs, $user_id = null)
    {
        $post->title = $inputs['title'];
        $post->summary = $inputs['summary'];
        $post->content = $inputs['content'];
        $post->slug = $inputs['slug'];
        $post->active = isset($inputs['active']);
        if ($user_id) {
            $post->user_id = $user_id;
        }
        $post->save();

        return $post;
    }


    public function getCurrentCardNum1(){
        return $this->model
            ->select('id', 'card_num', 'card_num_from', 'title', 'slug', 'user_id', 'summary')
            ->where('user_id', 2);
        //->with('user')
        //->latest();
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

    public function getCurrentCardNum($n){
        return $this->getCurrentCardNum1()->paginate($n);
    }

    public function getActiveWithUserOrderByDateForTag($n, $id)
    {
        return $this->queryActiveWithUserOrderByDate()
            ->whereHas('tags', function ($q) use ($id) {
                $q->where('tags.id', $id);
            })->paginate($n);
    }

    /*public function getPostsWithOrder($n, $user_id = null, $orderby = 'created_at', $direction = 'desc')
    {
        $query = $this->model
            ->select('posts.id', 'posts.created_at', 'title', 'posts.seen', 'active', 'user_id', 'slug', 'username')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->orderBy($orderby, $direction);

        if ($user_id) {
            $query->where('user_id', $user_id);
        }

        return $query->paginate($n);
    }*/

    public function getPostBySlug($slug)
    {
        $post = $this->model->with('user', 'tags')->whereSlug($slug)->firstOrFail();

        $comments = $this->comment
            ->wherePostId($post->id)
            ->with('user')
            ->whereHas('user', function ($q) {
                $q->whereValid(true);
            })
            ->get();

        return compact('post', 'comments');
    }

    public function getPostWithTags($post)
    {
        $tags = [];

        foreach ($post->tags as $tag) {
            array_push($tags, $tag->tag);
        }

        return compact('post', 'tags');
    }

    public function store($inputs, $user_id)
    {
        $post = $this->savePost(new $this->model, $inputs, $user_id);

        // Tags gestion
        if (array_key_exists('tags', $inputs) && $inputs['tags'] != '') {
            $tags = explode(',', $inputs['tags']);

            foreach ($tags as $tag) {
                $tag_ref = $this->tag->whereTag($tag)->first();
                if (is_null($tag_ref)) {
                    $tag_ref = new $this->tag;
                    $tag_ref->tag = $tag;
                    $post->tags()->save($tag_ref);
                } else {
                    $post->tags()->attach($tag_ref->id);
                }
            }
        }

        // Maybe purge orphan tags...
    }
}