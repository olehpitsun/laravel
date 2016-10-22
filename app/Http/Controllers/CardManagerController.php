<?php
/**
 * Created by PhpStorm.
 * User: oleh
 * Date: 21.10.16
 * Time: 11:34
 */

namespace App\Http\Controllers;

use App\Repositories\CardOwnersRepository;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use Illuminate\Routing\Controller;
use App\Repositories\CardManagerRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CardManagerController extends Controller
{

    protected $cardManagerRepository;

    protected $nbrPages;

    public function __construct(CardOwnersRepository $cardManagerRepository)
    {
        $this->cardManagerRepository = $cardManagerRepository;
       // $this->nbrPages = config('app.nbrPages.front.posts');
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $posts = $this->cardManagerRepository->getActiveWithUserOrderByDate($this->nbrPages, 2);

        return view('front.cardmanager.index', compact('posts'));
    }
}