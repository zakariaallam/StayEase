<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = DB::table('images')->get();
        return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'images.*' => 'required|image|mimes:jpg,jpeg,png,webp,jfif|max:2048',
            'titre' => 'nullable|max:255',
        ]);

        foreach ($request->file('images') as $file) {
            $name = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $name, 'public');

            Image::create([
                'titre' => $request->titre ?? 'Photo hôtel',
                'image_path' => $path,
                'hotel_id' => $request->hotel_id,
            ]);
        }

        return back();
    }


    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        return view('images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        $validated = $request->validate([
            'titre' => 'nullable|max:255',
            'image' => 'image|mimes:jpg,jpeg,png,webp,jfif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // delete pic
            if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }

            // save pic
            $file = $request->file('image');
            $name = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $name, 'public');
            $validated['image_path'] = $path;
        }

        $image->update($validated);

        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        // delete pic from stor
        if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        $hotel_id = $image->hotel_id;
        $image->delete();

        return redirect()->route('hotels.show', $hotel_id);
    }

}
