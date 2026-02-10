<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('paiement.stripe');
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
       $request->validate([
            'name' => 'required|string|max:255',
        ]);


        
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'reservation chambre'
                    ],
                    'unit_amount' => 100,
                ],
                'quantity' => 1
            ]],
            'mode' => 'payment',
            'success_url' => route('success',[],true),
            'cancel_url' => route('cancel',[],true),

        ]); 

        

        return redirect($session->url); 
    }

    public function success(){
        $reserv = new Reservation();
        $reserv->statut = 'confirmed';
        $reserv->dateDebut = "2026-05-30";
        $reserv->dateFin = "2026-08-30";
        $reserv->user_id = Auth::id();
        $reserv->save();
        return 'Paiement réussi ';
    }
    public function cancel(){
        return 'cancel';
    }
    public function show(Paiement $paiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paiement $paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paiement $paiement)
    {
        //
    }
}
