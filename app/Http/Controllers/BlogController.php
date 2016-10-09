<?php
/**
 * Created by PhpStorm.
 * User: oleh
 * Date: 09.10.16
 * Time: 11:30
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Routing\Controller;

class BlogController extends Controller
{

    public function index(){
        $blogs = Blog::all();
        return view('blog.index',['blogs' =>$blogs]);
    }

    public function create(){
      return view('blog.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'post' => 'required'
        ]);

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->post = $request->post;
        $blog->save();
        return redirect('blog')->with('message','Post has been updated');

    }

    public function show($id){
        $blog = Blog::find($id);
        if(!$blog){
            abort(404);
        }
        return view('blog.details')->with('detailpage', $blog);
    }

    public function edit($id){
        $blog = Blog::find($id);
        if(!$blog){
            abort(404);
        }
        return view('blog.edit')->with('detailpage', $blog);

    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
            'post' => 'required'
        ]);

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->post = $request->post;
        $blog->save();
        return redirect('blog')->with('message','Post has been updated');

    }

    public function destroy($id){
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('blog')->with('message', 'deleted');
    }
}