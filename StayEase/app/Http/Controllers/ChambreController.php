<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Tag;
use App\Models\Hotel;
use App\Models\Chambre;
use App\Models\Categorie;
use App\Models\Propriete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
=======
use App\Models\Chambre;
use Illuminate\Http\Request;
>>>>>>> 54d174758d4c0a514a971ba0b228b80696bce5db

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD


        $data = Chambre::all();
        return view('Chambre.Chambre', [
            'data' => $data
        ]);
=======
        //
>>>>>>> 54d174758d4c0a514a971ba0b228b80696bce5db
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD



        return view('Chambre.add', [
            'hotel' => Hotel::all(),
            'Categorie' => Categorie::all(),
            'Tag' => Tag::all(),
            'Propriete' => Propriete::all()
        ]);
=======
        //
>>>>>>> 54d174758d4c0a514a971ba0b228b80696bce5db
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
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
=======
        //
>>>>>>> 54d174758d4c0a514a971ba0b228b80696bce5db
    }

    /**
     * Display the specified resource.
     */
<<<<<<< HEAD
    public function show(Chambre $Chambre)
    {

        return view('/Chambre.show', [
            'dat' => $Chambre
        ]);
=======
    public function show(Chambre $chambre)
    {
        //
>>>>>>> 54d174758d4c0a514a971ba0b228b80696bce5db
    }

    /**
     * Show the form for editing the specified resource.
     */
<<<<<<< HEAD
    public function edit(Chambre $Chambre)
    {

        return view('/Chambre.edit', [
            'hotel' => Hotel::all(),
            'Categorie' => Categorie::all(),
            'Tag' => Tag::all(),
            'Propriete' => Propriete::all(),
            'Chambre'=>$Chambre
        ]);
=======
    public function edit(Chambre $chambre)
    {
        //
>>>>>>> 54d174758d4c0a514a971ba0b228b80696bce5db
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
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
        return  redirect('/Chambre');
=======
    public function update(Request $request, Chambre $chambre)
    {
        //
>>>>>>> 54d174758d4c0a514a971ba0b228b80696bce5db
    }

    /**
     * Remove the specified resource from storage.
     */
<<<<<<< HEAD
    public function destroy(Chambre $Chambre)
    {
        $Chambre->delete();
        return  redirect('/Chambre');
=======
    public function destroy(Chambre $chambre)
    {
        //
>>>>>>> 54d174758d4c0a514a971ba0b228b80696bce5db
    }
}
