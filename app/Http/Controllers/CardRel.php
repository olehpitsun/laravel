<?php
/**
 * Created by PhpStorm.
 * User: oleh
 * Date: 21.10.16
 * Time: 17:18
 */

namespace App\Http\Controllers;

use App\Repositories\CardRelRepository;
use Bestmomo\Installer\Http\Controllers\UserController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Blog;

class CardRel extends Controller
{

    protected $cardrelRepository;

    public function __construct(CardRelRepository $cardRelRepository)
    {
        $this->cardrelRepository = $cardRelRepository;
    }

    public function index($id){


        $blogs = \App\CardRel::query()->where('donorID','=',$id)->get() ;
        if(!$blogs){
            abort(404);
        }
//dd($blogs1);
        return view('cardRel.index')->with('blogs', $blogs);

        /*$blogs = Blog::query()->where('user_id','=',2)->get() ;

        //dd($blogs);
        return view('blog.index')->with('blogs', $blogs);*/
    }

    public function create(){
        return view('blog.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'post' => 'required',
            ]);
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->post = $request->post;
        $blog->save();

        return redirect('blog')->with('message','Post updated');
    }

    public function show($id){

        //$blog = Blog::find($id);
        $blogs = \App\CardRel::query()->where('card_num','=',$id)->get() ;
        if(!$blogs){
            abort(404);
        }
//dd($blogs1);
        return view('blog.details')->with('blogs', $blogs);
    }

    public function edit($id){
        $blog = Blog::find($id);
        if(!$blog){
            abort(404);
        }

        return view('blog.edit')->with('datailpage', $blog);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'title' => 'required',
            'post' => 'required',
        ]);
        $blog = new Blog($id);
        $blog->title = $request->title;
        $blog->post = $request->post;
        $blog->save();

        return redirect('blog')->with('message','Post updated');
    }
}