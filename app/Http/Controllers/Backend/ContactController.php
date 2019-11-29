<?php

namespace App\Http\Controllers\Backend;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{


    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('backend.pages.contact.index', compact('contacts'));
    }





    public function show(Contact $contact)
    {
        return view('backend.pages.contact.show', compact('contact'));
    }





    public function destroy(Contact $contact)
    {
       $contact->delete();

       return redirect()->back()->with('success', 'Contact Deleted Successfully Done !');
    }
}
