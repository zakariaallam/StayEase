<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = DB::table('hotels')->get();
        return view('hotels.index', compact('hotels'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'adresse' => 'required|max:400',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,jfif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('hotels', $name, 'public');
            $validated['image'] = $path;
        }
        
        Hotel::create($validated);
        return redirect()->route('hotels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        return view('hotels.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'adresse' => 'required|max:400',
            'description' => 'nullable',
            'image' => 'image|mimes:jpg,jpeg,png,webp,jfif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            // delete pic
            if ($hotel->image && Storage::disk('public')->exists($hotel->image)) {
                Storage::disk('public')->delete($hotel->image);
            }
            // reneme pic
            $file = $request->file('image');
            $name = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('hotels', $name, 'public');
            $validated['image'] = $path;
        }
        $hotel->update($validated);
        return redirect()->route('hotels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        // delete pic
        if ($hotel->image && Storage::disk('public')->exists($hotel->image)) {
            Storage::disk('public')->delete($hotel->image);
        }
        $hotel->delete();
        return redirect()->route('hotels.index');
    }
}
