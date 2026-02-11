<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Hotel;
use App\Models\Chambre;
use App\Models\Categorie;
use App\Models\Propriete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $data = Chambre::all();
        return view('Chambre.Chambre', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {



        return view('Chambre.add', [
            'hotel' => Hotel::all(),
            'Categorie' => Categorie::all(),
            'Tag' => Tag::all(),
            'Propriete' => Propriete::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validi = $request->validate([
            'numero' => 'required',
            'description' => 'required',
            'image' => 'required',
            'statut' => 'required',
            'capacite' => 'required',
            'hotel_id' => 'required',
            'categorie_id' => 'required',
            'tag_id' => 'required',
            'propriete_id' => 'required'
        ]);
        Chambre::create($validi);
        return redirect('/Chambre');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chambre $Chambre)
    {

        return view('/Chambre.show', [
            'dat' => $Chambre
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chambre $Chambre)
    {

        return view('/Chambre.edit', [
            'hotel' => Hotel::all(),
            'Categorie' => Categorie::all(),
            'Tag' => Tag::all(),
            'Propriete' => Propriete::all(),
            'Chambre' => $Chambre
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chambre $Chambre)
    {
        // dd($request);
        $Chambre->update([
            'numero' => $request->numero,
            'description' => $request->description,
            'image' => $request->image,
            'statut' => $request->statut,
            'capacite' => $request->capacite,
            'hotel_id' => $request->hotel_id,
            'categorie_id' => $request->categorie_id,
            'tag_id' => $request->tag_id,
            'propriete_id' => $request->propriete_id
        ]);
        return redirect('/Chambre');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chambre $Chambre)
    {
        $Chambre->delete();
        return redirect('/Chambre');
    }

    public function filterDesponible(Request $request)
    {
        $validate = $request->validate([
            "debu" => "required|date",
            "fin" => "required|date|after:debu"
        ]);

        $chambres = Chambre::with('hotel.user.reservation')
            ->whereHas('hotel.user.reservation', function ($q) use ($request) {
                $q->where('dateDebut', '<', $request->fin)
                    ->where('dateFin', '>', $request->debu);
            })->get();
        dd($chambres);
        return view('/', compact('chambres'));
    }
}
