<?php

namespace App\Http\Controllers;

use App\Mail\ReservationMail;
use App\Models\Paiement;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $room = Room::where('id', $id)->first();
        $dateDB = Carbon::parse("12-02-2026");
        $dateFn = Carbon::parse("20-02-2026");
        $df = $dateDB->diffInDays($dateFn);
        $total = $df * $room->price_per_night;
        return view('reservation.index', compact('room', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // \Stripe\Stripe::setApiKey(apiKey: env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'reservation chambre'
                        ],
                        'unit_amount' => 100,
                    ],
                    'quantity' => 1
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('success', [], true),
            'cancel_url' => route('cancel', [], true),

        ]);



        return redirect($session->url
        );
    }

    public function success()
    {
        $reserv = new Reservation();
        $reserv->statut = 'confirmed';
        $reserv->dateDebut = "2026-05-30";
        $reserv->dateFin = "2026-08-30";
        $reserv->user_id = Auth::id();
        $reserv->save();
        Mail::to(Auth::user()->email)->send(new ReservationMail(Auth::user()->name));
        return 'Paiement réussi ';
    }
    public function cancel()
    {
        return 'cancel';
    }

}
