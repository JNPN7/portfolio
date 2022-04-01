<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminContactController extends Controller
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
    public function index()
    {
        $contacts = Contact::all();
        $data = [
            'contacts' => $contacts
        ];
        return view('adminContact', $data);
    }

    public function deleteContact($id)
    {
        $contact = Contact::find($id);

        $contact->delete();

        Session::flash('success', 'Product deleted successfully');

        return redirect()->route('adminHome');
    }
}
