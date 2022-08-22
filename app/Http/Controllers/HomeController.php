<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactUser;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('dashboard', [
            'title' => 'Common contacts',
            'contacts' => Contact::paginate(15),
            'route' => $request->route()->getName(),
        ]);
    }

    public function favourite(Request $request)
    {
        return view('dashboard', [
            'title' => 'Favourite contacts',
            'contacts' => ContactUser::where('user_id', $request->user()->id)->leftJoin('contacts', 'contacts.id', '=', 'contact_user.contact_id')->select('contacts.*')->paginate(15),
            'route' => $request->route()->getName(),
        ]);
    }

    public function addFavourite(Request $request)
    {
        ContactUser::updateOrCreate([
            'user_id' => $request->user()->id,
            'contact_id' => $request->contact_id,
        ]);
        return redirect()->back();
    }

    public function removeFavourite(Request $request)
    {
        ContactUser::where('user_id', $request->user()->id)->where('contact_id', $request->contact_id)->delete();
        return redirect()->back();
    }

    public function addContacts()
    {
        $contacts = Contact::factory()->count(10)->create();
        return $contacts;
    }
}
