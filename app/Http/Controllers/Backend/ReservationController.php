<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Notifications\ReservationConfirm;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{


    public function index()
    {
        $reservations = Reservation::latest()->get();
       return view('backend.pages.reservation.index', compact('reservations'));
    }



    public function active($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => 1]);

        Notification::route('mail', $reservation->email)
            ->notify(new ReservationConfirm());

        Toastr::success('Publication Status Confirm ! ', 'success',["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }

    public function unactive($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => 0]);


        Toastr::success('Publication Status Not Confirm Success ! ', 'success',["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }



    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        Toastr::success('Deleted Success ! ', 'success',["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}
