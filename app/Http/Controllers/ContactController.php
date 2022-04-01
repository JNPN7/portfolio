<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function addContact(Request $request){
        $this->validateContact($request);
        $input = $request->all();

        $input['email'] = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
        htmlentities($input['name'], ENT_QUOTES, 'UTF-8');
        htmlentities($input['message'], ENT_QUOTES, 'UTF-8');
        htmlentities($input['subject'], ENT_QUOTES, 'UTF-8');
        $input['name'] = strip_tags($input['name']);
        $input['message'] = strip_tags($input['message']);
        $input['subject'] = strip_tags($input['subject']);
        $input['name'] = filter_var( $input['name'], FILTER_SANITIZE_STRING);
        $input['subject'] = filter_var( $input['subject'], FILTER_SANITIZE_STRING);
        $input['message'] = filter_var( $input['message'], FILTER_SANITIZE_STRING);

        $contact = new Contact();
        $contact->name = $input['name'];
        $contact->email = $input['email'];
        $contact->subject = $input['subject'];
        $contact->message = $input['message'];
        $contact->save();

        Session::flash('success', 'We got you message.');
        
        return redirect()->route('home');
    }

    protected function validateContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'subject' => 'required',
            'message' => 'required'
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'email is required',
            'subject.required' => 'subject is required',
            'message.required' => 'message is required'
        ]);
    }

    
}
