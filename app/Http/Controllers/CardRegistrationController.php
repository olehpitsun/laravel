<?php
/**
 * Created by PhpStorm.
 * User: oleh
 * Date: 20.10.16
 * Time: 18:40
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\CardRegistrationRequest;
use App\Repositories\CardRegistrationRepository;

class CardRegistrationController extends Controller
{

    protected $cardRegistrationRepository;


    public function __construct(CardRegistrationRepository $cardRegistrationRepository)
    {
        $this->cardRegistrationRepository = $cardRegistrationRepository;

        $this->middleware('admin')->except('create', 'store');
        $this->middleware('ajax')->only('update');
    }

    public function index()
    {
        $messages = $this->cardRegistrationRepository->getContactsOrder();

        return view('back.cardRegistration.index', compact('messages'));
    }

    public function create()
    {
        return view('front.card');
    }

    public function store(CardRegistrationRequest $request)
    {
        $this->cardRegistrationRepository->store($request->all());

        return redirect('/articles')->with('ok', trans('front/card.ok'));
    }

    public function update(Request $request, $id)
    {
        $this->cardRegistrationRepository->update($request->input('seen'), $id);

        return response()->json();
    }

    public function destroy($id)
    {
        $this->cardRegistrationRepository->destroy($id);

        return redirect('contact');
    }

}