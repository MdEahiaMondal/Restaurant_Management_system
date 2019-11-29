<?php

namespace App\Http\Controllers;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{


    public function contact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:40',
            'email' => 'required|max:80',
            'subject' => 'required|max:150',
            'message' => 'required',
        ]);

       Contact::create($request->all());

        Toastr::success('Thanks for contact us . We will Contuct to you as soon as prosebale ! ', 'success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

}
