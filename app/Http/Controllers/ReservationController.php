<?php

namespace App\Http\Controllers;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservation(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:55',
            'email' => 'required|max:100',
            'phone' => 'required|string',
            'date_time' => 'required',
            'message' => 'required|string',
        ]);

        Reservation::create($request->all());

        Toastr::success('Thanks for contack us . We will Contuct to you as soon as prosebale ! ', 'success',["positionClass" => "toast-top-right"]);
        return redirect()->route('home');

    }
}
