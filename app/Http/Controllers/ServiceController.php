<?php
/**
 * Created by PhpStorm.
 * User: oleh
 * Date: 21.10.16
 * Time: 17:18
 */

namespace App\Http\Controllers;

use App\Repositories\ServiceRepository;
use App\Service;
use App\ServiceItems;
use Bestmomo\Installer\Http\Controllers\UserController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Blog;

class ServiceController extends Controller
{

    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index(){

        $services = Service::all() ;

        //dd($blogs);
        return view('service.index')->with('services', $services);
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
        $serviceItems = ServiceItems::query()->where('service_id','=',$id)->get() ;
        if(!$serviceItems){
            abort(404);
        }
        //dd($blogs1);
        return view('service.details')->with('serviceItems', $serviceItems);
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